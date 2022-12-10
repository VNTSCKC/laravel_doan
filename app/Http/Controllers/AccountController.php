<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\dangkyRequest;
use App\Http\Requests\dangnhapRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Cache;
use Carbon;
use Session;
use Str;
use Yajra\Datatables\Datatables;

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
    public function getData(){
        $accounts=Account::all();
        return Datatables::of($accounts)
        ->addIndexColumn()
        ->addColumn('last_seen',function($account){
            if($account->last_seen)
                return Carbon\Carbon::parse($account->last_seen)->diffForHumans();
            else
                return 'Chưa đăng nhập lần nào';
        })
        ->addColumn('login_status',function($account){
            if (Cache::has('user-is-online-'.$account->id))
                    return '<span class="text-success">Online</span>';
            else
                    return '<span class="text-secondary">Offline</span>';
        })
        ->addColumn('action',function($account){
            return '<a class="btn btn-info" href="'.route('chi-tiet-tai-khoan',$account->id).'">Chi tiết</a>
            <a class="btn btn-secondary" href="'.route('cap-nhat-tai-khoan',$account->id).'">Sửa</a>
            <a class="btn btn-danger delete-account" href="/admin/user/xoa/'.$account->id.'">Xóa</a>';
        })
        ->editColumn('username',function($account){
            return $account->username;
        })
        ->editColumn('email',function($account){
            return $account->email;
        })
        ->editColumn('name',function($account){
            return $account->name;
        })
        ->editColumn('phone',function($account){
            return $account->phone;
        })->rawColumns(['action','last_seen','login_status'])->make(true);
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
        return redirect('/admin/user/danh-sach')->with('success_add','Thêm tài khoản thành công');

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
        return redirect('/admin/user/danh-sach')->with('success_update','Cập nhật thành công');
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
        return redirect('/admin/user/danh-sach')->with('success_delete','Xóa tài khoản thành công');
    }
    public function indexMain()
    {
        return view('user.trangchu');
    }
    public function reVerifyAccount(Account $account,$token){
        if($account->token==$token){
            $account->update(['token'=>Str::random(40)]);
            Mail::send('emails.activeaccount', compact('account'), function ($message) use($account) {
                $message->to($account->email, $account->name);
                $message->subject('Tìm đồ xịn - Xác nhận tài khoản');
            });
            return redirect()->route('dang-nhap')->with('success_reverify_account','Đã gửi thư xác nhận qua Gmail, Vui lòng vào email để xác nhận');
        }
    }
    public function dangKy()
    {
        return view('dangky');
    }
    public function xuliDangKy(dangkyRequest $request)
    {
        $exist=Account::where('username',$request->username)->orWhere('email',$request->email)->first();
        if($exist){
            return redirect()->back()->with('error','Tài khoản hoặc email đã được sử dụng');
        }
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
                $message->subject('Tìm đồ xịn - Xác nhận tài khoản');
            });
            return redirect()->route('dang-nhap')->with('success_login','Đăng ký thành công, Vui lòng xác nhận qua Email');
        }
        return redirect()->back();
    }
    public function active(Account $account, $token){
        if($account->token==$token){
            $account->update(['status'=>true,'token'=>null]);
            return redirect()->route('dang-nhap')->with('success_verify_account','Tài khoản của bạn đã được kích hoạt, Bây giờ bạn có thể đăng nhập');
        }
        return redirect()->route('dang-nhap')->with('fail_verify_account','Mã kích hoạt không hợp lệ');
    }
    public function dangNhap()
    {
        return view('dangnhap');
    }
    public function xulyDangNhap(dangnhapRequest $request)
    {
        $credentials = $request->only('username','password');// Lấy giá trị của input username và password
        //$isAdmin=Account::where('username',$request->username)->first()->position;
        // if($isAdmin=="admin"){

        //     if(Auth::guard('admin')->attempt($credentials)) // Kiểm tra chứng thực người dùng
        //     {
        //         $account=Account::where('username',$request->username)->first();

        //         if($account->status==0){
        //             Auth::guard('admin')->logout();
        //             return redirect()->route('dang-nhap')->with('verify_account','Tài khoản của bạn chưa được kích hoạt, Vui lòng <strong><a href="/revefiry-account/'.$account->id.'/'.$account->token.'">Click vào đây</a> </strong>để kích hoạt tài khoản qua gmail');
        //         }
        //         Session::put('username',$request->username);

        //         return redirect('/admin/dashboard');
        //     }
        //     return redirect()->back()->with("error","Đăng nhập không thành công");
        // }
        if(Auth::attempt($credentials)) // Kiểm tra chứng thực người dùng
        {
            $account=Account::where('username',$request->username)->first();

            if($account->status==0){
                Auth::logout();
                return redirect()->route('dang-nhap')->with('verify_account','Tài khoản của bạn chưa được kích hoạt, Vui lòng <strong><a href="/revefiry-account/'.$account->id.'/'.$account->token.'">Click vào đây</a> </strong>để kích hoạt tài khoản qua gmail');
            }
            Session::put('username',$request->username);
            if($account->position=='admin'){
                return redirect('/admin/dashboard');
            }
            return redirect()->route('trang-chu-nguoi-dung');
        }
        return redirect()->back()->with("error","Đăng nhập không thành công");
    }
    public function dangXuat()
    {


        //Auth::guard('admin')->logout();
        Auth::logout();
        return redirect('/dang-nhap');

    }
}
