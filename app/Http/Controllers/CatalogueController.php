<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;
use Yajra\Datatables\Datatables;


class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCatalogue=Catalogue::all();
        return view('admin.item.catalogue.catalogue',['listCatelogue'=>$listCatalogue]);
    }
    public function getData(){
        $catalogues=Catalogue::all();
        return Datatables::of($catalogues)
        ->addIndexColumn()
        ->addColumn('action',function($catalogue){
            return '<td><a class="btn btn-info" href="'.route('chi-tiet-danh-muc-tim-do',$catalogue->id).'">Chi tiết</a></td>
            <td><a class="btn btn-secondary" href="'.route('cap-nhat-danh-muc-tim-do',$catalogue->id).'">Sửa</a></td>
            <td><a class="btn btn-danger" href="/admin/item/catalogue/xoa/'.$catalogue->id.'">Xóa</a></td>';
        })
        ->editColumn('name',function($catalogue){
            return $catalogue->name;
        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.item.catalogue.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist=Catalogue::where('name',$request->name)->first();
        if($exist){
            return redirect()->back()->with('error','Đã có danh mục này rồi');
        }
        $catalogue=new Catalogue;
        $catalogue->name=$request->name;
        $catalogue->save();
        return redirect('admin/item/catalogue/danh-sach')->with('success_add','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogue=Catalogue::find($id);
        return view('admin.item.catalogue.detail',['catalogue'=>$catalogue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalogue=Catalogue::find($id);
        return view('admin.item.catalogue.update',['catalogue'=>$catalogue]);
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
        $exist=Catalogue::where('name',$request->name)->where('id','<>',$request->id)->first();
        if($exist){
            return redirect()->back()->with('error','Đã có danh mục này rồi');
        }
        $catalogue=Catalogue::find($id);
        $catalogue->name=$request->name;
        $catalogue->save();
        return redirect('admin/item/catalogue/danh-sach')->with('success_update','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalogue=Catalogue::find($id);
        $catalogue->delete();
        $catalogue->save();
        return redirect('admin/item/catalogue/danh-sach')->with('success_delete','Xóa danh mục thành công');
    }
}
