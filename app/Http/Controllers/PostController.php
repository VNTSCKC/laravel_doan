<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Account;
use App\Models\TypePost;
use App\Models\Catalogue;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost=Post::where('type_id','1')->orWhere('type_id','2')->get();
        return view('admin.post.post',['listPost'=>$listPost]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listAccount=Account::all();
        $listTypePost=TyPePost::all();
        $listCatalogue=Catalogue::all();
        return view('admin.post.add',['listAccount'=>$listAccount,'listTypePost'=>$listTypePost,'listCatalogue'=>$listCatalogue]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Post::create($request->all())){
            return redirect('admin/post/danh-sach')->with('success_add','Thêm bài đăng thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('admin.post.detail',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listAccount=Account::all();
        $post=Post::find($id);
        $listTypePost=TyPePost::all();
        $listCatalogue=Catalogue::all();
        return view('admin.post.update',['post'=>$post,'listAccount'=>$listAccount,'listTypePost'=>$listTypePost,'listCatalogue'=>$listCatalogue]);
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
        $post=Post::find($id);
        if($request->has('imageupload')){
            $file=$request->imageupload;
            $file_name=time().".". $file_extension=$file->extension();
            $file->move(public_path('images/post'),$file_name);
            $request->merge(['image'=>$file_name]);
        }
        if($post->update($request->all())){
            $post->save();
            return redirect('admin/post/danh-sach')->with('success_update','Cập nhật bài đăng thành công');
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
        $post=Post::find($id);
        $post->delete();
        $post->save();
        return redirect('admin/post/danh-sach')->with('success_delete','Xóa bài đăng thành công');

    }
}
