<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\dangkyRequest;
use App\Http\Requests\dangnhapRequest;
use App\Http\Requests\quenMatKhauRequest;
use App\Http\Requests\passwordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Session;
use Str;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAccount=Account::all();
        return view('admin.user.user',['listAccount'=>$listAccount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('imageupload')){
            $file=$request->imageupload;
            $file_name=time().".". $file_extension=$file->extension();
            $file->move(public_path('images/UserImages'),$file_name);
            $request->merge(['image'=>$file_name]);
        }
        $request->trang_thai_dang_bai=="on"?$request->merge(['status_post'=>true]):$request->merge(['status_post'=>false]);

        $account=new Account;
        $account->fill([
            "username"=>$request->username,
            "password"=>Hash::make($request->password),
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->address,
            "dateofbirth"=>$request->dateofbirth,
            "image"=>$request->image,
            "position"=>$request->position,
            "status_post"=>$request->status_post,]);
        $account->save();
        return redirect('/admin/user/danh-sach')->with('success_add','Th??m t??i kho???n th??nh c??ng');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $account=Account::find($id);
        if($account==null){
            echo "ERROR";
        }
        else{
            return view('admin.user.detail',["account"=>$account]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account=Account::find($id);
        return view('admin.user.update',['account'=>$account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account=Account::find($id);
        if($request->has('imageupload')){
            $file=$request->imageupload;
            $file_name=time().".". $file_extension=$file->extension();
            $file->move(public_path('images/UserImages'),$file_name);
            $request->merge(['image'=>$file_name]);
        }
        $request->trang_thai_dang_bai=="on"?$request->merge(['status_post'=>true]):$request->merge(['status_post'=>false]);
        if($account->update($request->all())){
        $account->save();
        return redirect('/admin/user/danh-sach')->with('success_update','C???p nh???t th??nh c??ng');
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account=Account::find($id);
        $account->delete();
        $account->save();
        return redirect('/admin/user/danh-sach')->with('success_delete','X??a t??i kho???n th??nh c??ng');
    }
    public function reVerifyAccount(Account $account,$token){

        $account->update(['token'=>Str::random(40)]);
        Mail::send('emails.activeaccount', compact('account'), function ($message) use($account) {
            $message->to($account->email, $account->name);
            $message->subject('T??m ????? x???n - X??c nh???n t??i kho???n');
        });
        return redirect()->route('dang-nhap')->with('success_reverify_account',
        '???? g???i th?? x??c nh???n qua Gmail, Vui l??ng v??o email ????? x??c nh???n');
        
    }
   
    public function dangKy()
    {
        return view('dangky');
    }
    public function xuliDangKy(dangkyRequest $request)
    {
        if($account=Account::create(
            [
                'username'=>$request->username,
                'password'=>Hash::make($request->password),
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'position'=>'user',
                'status_post'=>true,
                'token'=>Str::random(40),
            ]
        )){
            Mail::send('emails.activeaccount', compact('account'), function ($message) use($account) {
                $message->to($account->email, $account->name);
                $message->subject('T??m ????? x???n - X??c nh???n t??i kho???n');
            });
            return redirect()->route('dang-nhap')->with('success_login','????ng k?? th??nh c??ng, Vui l??ng x??c nh???n qua Email');
        }
        return redirect()->back();
    }
    public function active(Account $account, $token){
        if($account->token==$token){
            $account->update(['status'=>true,'token'=>null]);
            return redirect()->route('dang-nhap')->with('success_verify_account','T??i kho???n c???a b???n ???? ???????c k??ch ho???t, B??y gi??? b???n c?? th??? ????ng nh???p');
        }
        return redirect()->route('dang-nhap')->with('fail_verify_account','M?? k??ch ho???t kh??ng h???p l???');
    }


    //-----


    public function quenMatKhau()
    {
        return view('password.quenmatkhau');
    }
    public function layMatkhau(Account $account , $token_password)
    {
        // dd($token_password);
        if($account->token_password == $token_password)
        {
            return view('password.datlaimatkhau',['account'=>$account,'token_password'=>$token_password]);
        }
        
        return abort(404);
    }

    
    public function xulyQuenmatkhau(quenMatkhauRequest $request)
    {
       
       
        $account = Account::where('email',$request->email)->first();
        if($account !=null) {
            $account->update(['token_password'=>Str::random(40)]);
        Mail::send('emails.check_email_password', compact('account'), function($email) use($account) 
        {
            
            $email->to($account->email, $account->name);
            $email->subject('T??m ????? x???n - ?????t l???i m???t kh???u');  
           
        });
        return redirect()->route('dang-nhap')->with('forget_password','Vui l??ng ki???m tra Email ????? ?????t l???i m???t kh???u'); 
        }
        return redirect()->route('quen-mat-khau')->with('error','Email kh??ng t???n t???i');
         
    }
   
    
    public function xylylayMatkhau(Request $request, Account $account )
    {
        
        $password_change =Hash::make($request->password);
        $account->update(['password'=>$password_change,'token_password'=>null]);
        return redirect()->route('dang-nhap')->with('success_forget_password','?????t l???i m???t kh???u th??nh c??ng');
    }




    //-------


    public function dangNhap()
    {
        return view('dangnhap');
    }
    public function xulyDangNhap(dangnhapRequest $request)
    {
        $credentials = $request->only('username','password');// L???y gi?? tr??? c???a input username v?? password

        if(Auth::attempt($credentials)) // Ki???m tra ch???ng th???c ng?????i d??ng
        {
            $account=Account::where('username',$request->username)->first();
            if($account->status==0){
                Auth::logout();
                return redirect()->route('dang-nhap')->with('verify_account','T??i kho???n c???a b???n ch??a ???????c k??ch ho???t, Vui l??ng <strong><a href="/revefiry-account/'.$account->id.'/'.$account->token.'">Click v??o ????y</a> </strong>????? k??ch ho???t t??i kho???n qua gmail');
            }
            Session::put('username',$request->username);
            return redirect()->route('trang-chu-nguoi-dung');
        }
        return redirect()->back()->with("error","????ng nh???p kh??ng th??nh c??ng");
    }
    public function dangXuat()
    {
        Auth::logout();
        return redirect('/dang-nhap');
    }
}
