<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeNewsCast;

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
