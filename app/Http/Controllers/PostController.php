<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Account;
use App\Models\TypePost;
use App\Models\Catalogue;
use App\Models\Report;
use Yajra\Datatables\Datatables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.post');
    }
    public function getData(){
        $posts=Post::where('type_id','1')->orWhere('type_id','2')->get();
        return Datatables::of($posts)
        ->addIndexColumn()
        ->addColumn('action',function($post){
            return '<a class="btn btn-info" href="'.route('chi-tiet-bai-dang',$post->id).'">Chi tiết</a>
            <a class="btn btn-secondary" href="'.route('cap-nhat-bai-dang',$post->id).'">Sửa</a>
            <a class="btn btn-danger delete-post" href="/admin/post/xoa/'.$post->id.'">Xóa</a>';
        })
        ->editColumn('title',function($post){
            return $post->title;
        })
        ->editColumn('datetime',function($post){
            return $post->created_at;
        })
        ->editColumn('user_post',function($post){
            return $post->nguoiDang->name;
        })
        ->editColumn('type',function($post){
            return $post->loaiBaiDang->name;
        })
        ->editColumn('catalogue',function($post){
            return $post->loaiDo->name;
        })
        ->rawColumns(['action'])
        ->make(true);
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
        $reports=Report::where('post_id',$id)->offset(0)->limit(10)->get();
        return view('admin.post.detail',['post'=>$post,'reports'=>$reports]);
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
        if($request->has('checked_founded')){
            if($request->checked_founded=="on"){
                $request->merge(['founded'=>true]);
            }
        }
        else{
            $request->merge(['founded'=>false]);
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
    public function detail_report($id){
        $report=Report::where('id',$id)->first();
        return response()->json([
            'content' => $report->content
        ]);
    }
    public function changeStatusFounded(Post $post,$checked){
        $post->update([
            'founded'=>$checked
        ]);
        $post->save();
        return redirect()->route('trang-chu-nguoi-dung');
    }
}
