<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\RoomMessage;
use App\Models\Account;
use App\Events\RedisEvent;
use Auth;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listRoomMessage=RoomMessage::where('first_user',Auth::user()->id)->orWhere('second_user',Auth::user()->id)->get();
        return view('message.message',['listRoomMessage'=>$listRoomMessage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

       if($message=Message::create($request->all())){
        event(
            $e=new RedisEvent($message)
        );
        return true;
       }
        return false;

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
    public function show(RoomMessage $room)
    {
        $listMessage=Message::where('room_id',$room->id)->get();
        $listRoomMessage=RoomMessage::where('first_user',Auth::user()->id)->orWhere('second_user',Auth::user()->id)->get();
        if($room->first_user==Auth::user()->id){
            // dd($room->second_user);

            $account=Account::find($room->second_user);

            return view('message.message_detail',['room'=>$room,'listRoomMessage'=>$listRoomMessage,'listMessage'=>$listMessage,'receive_user'=>$account]);
        }
        else{
            $account=Account::find($room->first_user);
            return view('message.message_detail',['room'=>$room,'listRoomMessage'=>$listRoomMessage,'listMessage'=>$listMessage,'receive_user'=>$account]);
        }


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
        //
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
