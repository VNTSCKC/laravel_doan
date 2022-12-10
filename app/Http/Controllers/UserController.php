<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\Catalogue;
use App\Models\TypePost;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use App\Models\NewsCast;
use Session;
use App\Models\PostFollow;
use App\Models\RoomMessage;
use App\Models\Message;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $listPost=Post::orderBy('created_at','desc')->get();
        return view('user.home',['listPost'=>$listPost]);
    }
    public function searchpost(Request $request){

        $listPost=Post::where('title','like','%'.$request->txtSearch.'%')->orderBy('created_at','desc')->get();

        $listPostFollow=PostFollow::where('account_id',Auth::user()->id)->get();
        return view('user.search',['listPost'=>$listPost,'listPostFollow'=>$listPostFollow]);
    }
    public function follow(Request $request){

        if($request->type==1){
            if(PostFollow::create(['post_id'=>$request->follow_post_id,'account_id'=>Auth::user()->id])){
                return true;
            }
        }
        else{
            $postFollow=PostFollow::where([
                ['post_id','=',$request->follow_post_id],
                ['account_id','=',Auth::user()->id],
                ])->first();
            $postFollow->delete();
            $postFollow->save();
            return true;
        }

    }
    public function index()
    {
        $account=Account::where('username',Session::get('username'))->first();
        $news=NewsCast::where('type_id',2)->orderBy('updated_at','desc')->offset(0)->limit(5)->get();
        $tips=NewsCast::where('type_id',1)->orderBy('updated_at','desc')->offset(0)->limit(5)->get();
        $listPost=Post::orderBy('created_at','desc')->get();
        $listPostFollow=PostFollow::where('account_id',$account->id)->get();
        return view('user.trangchu',['listPost'=>$listPost,'listPostFollow'=>$listPostFollow,'listNews'=>$news,'listTip'=>$tips]);
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
    public function report(Request $request){

        if(Report::create(['post_id'=>$request->report_id,'account_id'=>Auth::user()->id,'content'=>$request->content]))
            return true;
    }
    public function information($id){
        $account=Account::where('id',$id)->first();
        return view('user.profile-neighbor',['account'=>$account]);
    }
    public function sendMessage(Request $request){

        $message=RoomMessage::where([
            ['first_user',Auth::user()->id],
            ['second_user',$request->send_id],
          ])->orWhere(function($query) use($request){
            $query->where('second_user',Auth::user()->id)->where('first_user',$request->send_id);
          })->first();
        if(!$message){
            if($room=RoomMessage::create([
                'first_user'=>Auth::user()->id,
                'second_user'=>$request->send_id,
            ])){
                Message::create([
                    'room_id'=>$room->id,
                    'send_id'=>Auth::user()->id,
                    'receive_id'=>$request->send_id,
                    'content'=>$request->content,
                ]);
            }
        }else{
            Message::create([
                'room_id'=>$message->id,
                'send_id'=>Auth::user()->id,
                'receive_id'=>$request->send_id,
                'content'=>$request->content,
            ]);
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
