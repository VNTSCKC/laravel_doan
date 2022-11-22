<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\Catalogue;
use App\Models\TypePost;
use Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost=Post::all();
        return view('user.trangchu',['listPost'=>$listPost]);
    }

    public function createpost(){
        $listTypePost=TypePost::all();
        $listCatalogue=Catalogue::all();
        return view('user.createpost',['listTypePost'=>$listTypePost,'listCatalogue'=>$listCatalogue]);
    }
    public function storepost(Request $request){
        $account=Account::where('username',Session::get('username'))->first();
        $request->merge(['account_id'=>$account->id]);
        if(Post::create($request->all())){
            return redirect('user/trang-chu')->with('success_create_post','Tạo bài đăng thành công');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $account=Account::find($id);
        return view('user.profile',['account'=>$account]);


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
        //
        $account=Account::find($id);
        $account->fill([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->address,
            "dateofbirth"=>$request->dateofbirth
        ]);
        $account->save();
        return redirect()->route('trang-chu-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
