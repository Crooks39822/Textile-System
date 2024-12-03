<?php

namespace App\Http\Controllers\Backend;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function chat(Request $request)
    {

        $data['header_title'] = 'My Chat';
        $sender_id = Auth::user()->id;
        if(!empty($request->reciever_id))
        {
            $reciever_id = base64_decode($request->reciever_id);
            if($reciever_id == $sender_id)
            {
                return redirect()->back()->with('error','You cannot send message to yourself!');
                exit();
            }
            $data['reciever_id']  = $reciever_id;
          Chat::updateCount($reciever_id,$sender_id);
        $data['getReciever']  = User::getSingle($reciever_id);
        $data['getChat']  = Chat::getChat($reciever_id,$sender_id);
        }
        else{
            $data['reciever_id']  = '';
        }
        $data['getChatUser'] = Chat::getChatUser($sender_id);
        return view('backend/chat/list',$data);
    }
    public function get_chat_windows(Request $request)
        {
            $reciever_id = $request->reciever_id;
            $sender_id = Auth::user()->id;
            Chat::updateCount($reciever_id,$sender_id);
            $getReciever  = User::getSingle($reciever_id);
            $getChat  = Chat::getChat($reciever_id,$sender_id);

            return response()->json([
                "status" => true,
                "reciever_id" => base64_encode($reciever_id),
                "success" => view('backend.chat._messages', [
                    "getReciever" => $getReciever,
                    "getChat" => $getChat,
                    ])->render(),
                        ],200);
        }

    public function submit_message(Request $request)
    {

      $chat = new Chat;
      $chat->sender_id = Auth::user()->id;
      $chat->reciever_id = $request->reciever_id;
      $chat->message = $request->message;
      $chat->created_date = date('Y-m-d H:i:s');
      if(!empty($request->file('file')))
        {


          $ext =$request->file('file')->getClientoriginalExtension();
          $file =$request->file('file');
          $randomStr = date('Ymdhis').Str::random(20);
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/chat/',$filename);
          $chat->file  =$filename;
        }
      $chat->save();

      $getChat  = Chat::where('id','=',$chat->id)->get();

      return response()->json([
        "status" => true,
        "success" => view('backend.chat._single', [
        "getChat" => $getChat
            ])->render(),
                ],200);
    }

    public function get_chat_search_user(Request $request)
    {
        $reciever_id = $request->reciever_id;
        $sender_id = Auth::user()->id;
        $getChatUser = Chat::getChatUser($sender_id);
        return response()->json([
            "status" => true,
            "success" => view('backend.chat._user', [
                "getChatUser" => $getChatUser,
                "reciever_id" => $reciever_id,
                ])->render(),
                    ],200);
    }
}
