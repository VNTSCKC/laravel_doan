<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsCast;
use App\Models\Account;
use App\Models\TypeNewsCast;
use App\Http\Requests\newsCastRequest;

use Yajra\Datatables\Datatables;

class NewsCastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($type_id,$id){
        $newsCast=NewsCast::where('type_id',$type_id)->where('id',$id)->first();
        return view('user.chitietbantin',['newsCast'=>$newsCast]);
    }
    public function getAll($id){
        $newsCasts=NewsCast::where('type_id',$id)->get();
        return view('user.bantin',['newsCasts'=>$newsCasts]);
    }
    public function index(String $loainewscast)
    {
        if($loainewscast=="meo-tim-do"){
            return view('admin.newscast.newscast',['type'=>'meo-tim-do']);
        }
        if($loainewscast=="tin-tuc"){
            return view('admin.newscast.newscast',['type'=>'tin-tuc']);
        }
    }
    public function getData(String $type){
        if($type=="meo-tim-do"){
            $newsCasts=NewsCast::where('type_id','1')->get();
        }
        if($type=="tin-tuc"){
            $newsCasts=NewsCast::where('type_id','2')->get();
        }
        return Datatables::of($newsCasts)
        ->addIndexColumn()
        ->addColumn('action',function($newsCast){
            return '<a class="btn btn-info" href="'.route('chi-tiet-ban-tin',$newsCast->id).'">Chi tiết</a>
            <a class="btn btn-secondary" href="'.route('cap-nhat-ban-tin',$newsCast->id).'">Sửa</a>
            <a class="btn btn-danger" href="/admin/news-cast/xoa/'.$newsCast->id.'">Xóa</a>';
        })
        ->editColumn('title',function($newsCast){
            return $newsCast->title;
        })
        ->editColumn('datetime',function($newsCast){
            return $newsCast->created_at;
        })
        ->editColumn('user_post',function($newsCast){

            return $newsCast->nguoiDang->name;
        })
        ->editColumn('type',function($newsCast){
            return $newsCast->loaiBanTin->name;
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
        $listTypeNewsCast=TypeNewsCast::all();
        return view('admin.newscast.add',['listAccount'=>$listAccount,'listTypeNewsCast'=>$listTypeNewsCast]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newsCastRequest $request)
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
    public function update(newsCastRequest $request, $id)
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
