<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\Catalogue;
use App\Models\TypePost;
use Session;
use App\Models\PostFollow;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function follow(Post $post,Request $request){

        $account=Account::where('username',Session::get('username'))->first();
        if(PostFollow::create(['post_id'=>$post->id,'account_id'=>$account->id])){
            return true;
        }
    }
    public function index()
    {
        $account=Account::where('username',Session::get('username'))->first();

        $listPost=Post::orderBy('created_at','desc')->get();
        $listPostFollow=PostFollow::where('account_id',$account->id)->get();
        return view('user.trangchu',['listPost'=>$listPost,'listPostFollow'=>$listPostFollow]);
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
    public function editPost(Post $post){
        $listTypePost=TypePost::all();
        $listCatalogue=Catalogue::all();
        return view('user.updatepost',['post'=>$post,'listTypePost'=>$listTypePost,'listCatalogue'=>$listCatalogue]);
    }
    public function updatePost(Request $request,Post $post){
        $post->update($request->all());
        return redirect()->route('trang-chu-nguoi-dung');
    }
    public function destroyPost(Post $post){
        $post->delete();
        $post->save();
        return redirect()->route('trang-chu-nguoi-dung');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(accountRequest $request, $id)
    {
        // dd($request->input());
        /*$request->validate([
            'name'=>'required',
            'phone'=>'nullable|between:9,13'
        ]);*/
        //
        $account=Account::find($id);
        if($request->has('imageupload')){
            $file=$request->imageupload;
            $file_name=time().".". $file_extension=$file->extension();
            $file->move(public_path('images/UserImages'),$file_name);
            $request->merge(['image'=>$file_name]);
        }
        if($account->update($request->all())){

            $account->save();
            return redirect()->route('trang-chu-nguoi-dung');
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
        //
    }
}
