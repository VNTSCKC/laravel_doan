<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePost;
use Yajra\Datatables\Datatables;
use App\Http\Requests\typePostRequest;

class TypePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTypePost=TypePost::all();
        return view('admin.typepost.typepost',['listTypePost'=>$listTypePost]);
    }
    public function getData(){
        $typePosts=TypePost::all();
        return Datatables::of($typePosts)
        ->addIndexColumn()
        ->addColumn('action',function($typePost){
            return '<td><a class="btn btn-info" href="'.route('chi-tiet-loai-bai-dang',$typePost->id).'">Chi tiết</a></td>
            <td><a class="btn btn-secondary" href="'.route('cap-nhat-loai-bai-dang',$typePost->id).'">Sửa</a></td>
            <td><a class="btn btn-danger" href="/admin/type-post/xoa/'.$typePost->id.'">Xóa</a></td>';
        })
        ->editColumn('name',function($typePost){
            return $typePost->name;
        })->rawColumns(['action'])->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typepost.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(typePostRequest $request)
    {
        if(TypePost::where('name',$request->name)->first()){
            return redirect()->back()->with('error','Đã có loại bài đăng này rồi');
        }
        if(TypePost::create($request->all())){
            return redirect('admin/type-post/danh-sach')->with('success_add','Thêm loại bài đăng thành công');
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
        $typePost=TypePost::find($id);
        return view('admin.typepost.detail',['typePost'=>$typePost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typePost=TypePost::find($id);
        return view('admin.typepost.update',['typePost'=>$typePost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(typePostRequest $request, $id)
    {
        if(TypePost::where('name',$request->name)->where('id','<>',$id)->first()){
            return redirect()->back()->with('error','Đã có loại bài đăng này rồi');
        }
        $typePost=TypePost::find($id);
        if($typePost->update($request->all())){
            $typePost->save();
            return redirect('admin/type-post/danh-sach')->with('success_update','Cập nhật loại bài đăng thành công');
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
        $typePost=TypePost::find($id);
        $typePost->delete();
        $typePost->save();
        return redirect('admin/type-post/danh-sach')->with('success_delete','Xóa loại bài đăng thành công');
    }
}
