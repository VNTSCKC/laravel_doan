<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsCast;
use App\Models\Account;
use App\Models\TypeNewsCast;

class NewsCastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(String $loainewscast)
    {
        if($loainewscast=="meo-tim-do"){
        $listNewsCast=NewsCast::where('type_id','1')->get();
        return view('admin.newscast.newscast',['listNewsCast'=>$listNewsCast]);
        }
        if($loainewscast=="tin-tuc"){
            $listNewsCast=NewsCast::where('type_id','2')->get();
            return view('admin.newscast.newscast',['listNewsCast'=>$listNewsCast]);
            }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listAccount=Account::all();
        $listTypeNewsCast=TyPeNewsCast::all();
        return view('admin.newscast.add',['listAccount'=>$listAccount,'listTypeNewsCast'=>$listTypeNewsCast]);
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
            $file->move(public_path('images/post'),$file_name);
            $request->merge(['image'=>$file_name]);
        }
        if(NewsCast::create($request->all())){
            return redirect('admin/news-cast/danh-sach/meo-tim-do')->with('success_add','Thêm bản tin thành công');
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
        $newsCast=NewsCast::find($id);
        return view('admin.newscast.detail',['newsCast'=>$newsCast]);
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
        $newsCast=NewsCast::find($id);
        $listTypeNewsCast=TypeNewsCast::all();
        return view('admin.newscast.update',['newsCast'=>$newsCast,'listAccount'=>$listAccount,'listTypeNewsCast'=>$listTypeNewsCast]);
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
        $newsCast=NewsCast::find($id);
        if($request->has('imageupload')){
            $file=$request->imageupload;
            $file_name=time().".". $file_extension=$file->extension();
            $file->move(public_path('images/post'),$file_name);
            $request->merge(['image'=>$file_name]);
        }
        if($newsCast->update($request->all())){
            $newsCast->save();
            return redirect('admin/news-cast/danh-sach/meo-tim-do')->with('success_update','Cập nhật bản tin thành công');
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
        $newsCast=NewsCast::find($id);
        $newsCast->delete();
        $newsCast->save();
        return redirect('admin/news-cast/danh-sach/meo-tim-do')->with('success_delete','Xóa bản tin thành công');

    }
}
