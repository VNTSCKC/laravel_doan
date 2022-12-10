<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeNewsCast;
use Yajra\Datatables\Datatables;


class TypeNewsCastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTypeNewsCast=TypeNewsCast::all();
        return view('admin.typenewscast.typenewscast',['listTypeNewsCast'=>$listTypeNewsCast]);
    }
    public function getData(){
        $typeNewsCasts=TypeNewsCast::all();
        return Datatables::of($typeNewsCasts)
        ->addIndexColumn()
        ->addColumn('action',function($typeNewsCast){
            return '<td><a class="btn btn-info" href="'.route('chi-tiet-loai-ban-tin',$typeNewsCast->id).'">Chi tiết</a></td>
            <td><a class="btn btn-secondary" href="'.route('cap-nhat-loai-ban-tin',$typeNewsCast->id).'">Sửa</a></td>
            <td><a class="btn btn-danger" href="/admin/type-news-cast/xoa/'.$typeNewsCast->id.'">Xóa</a></td>';
        })
        ->editColumn('name',function($typeNewsCast){
            return $typeNewsCast->name;
        })->rawColumns(['action'])->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typenewscast.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(TypeNewsCast::where('name',$request->name)->first()){
            return redirect()->back()->with('error','Đã có loại bản tin này rồi');
        }
        if(TypeNewsCast::create($request->all())){
            return redirect('admin/type-news-cast/danh-sach')->with('success_add','Thêm loại bản tin thành công');
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
        $typeNewsCast=TypeNewsCast::find($id);
        return view('admin.typenewscast.detail',['typeNewsCast'=>$typeNewsCast]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeNewsCast=TypeNewsCast::find($id);
        return view('admin.typenewscast.update',['typeNewsCast'=>$typeNewsCast]);
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
        if(TypeNewsCast::where('name',$request->name)->where('id','<>',$id)->first()){
            return redirect()->back()->with('error','Đã có loại bản tin này rồi');
        }
        $typeNewsCast=TypeNewsCast::find($id);
        if($typeNewsCast->update($request->all())){
            $typeNewsCast->save();
            return redirect('admin/type-news-cast/danh-sach')->with('success_update','Cập nhật loại bản tin thành công');
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
        $typeNewsCast=TypeNewsCast::find($id);
        $typeNewsCast->delete();
        $typeNewsCast->save();
        return redirect('admin/type-news-cast/danh-sach')->with('success_delete','Xóa loại bản tin thành công');
    }
}
