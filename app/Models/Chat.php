<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';

    public static function getChat($reciever_id, $sender_id)
    {
         $query = self::select('chats.*')
                     ->where(function($q) use ($reciever_id, $sender_id){

                     $q->where(function($q) use ($reciever_id, $sender_id) {
                      $q ->where('reciever_id',$sender_id)
                        ->where('sender_id',$reciever_id)
                        ->where('status','>','-1');

            })->orWhere(function($q) use ($reciever_id, $sender_id){
                 $q->where('reciever_id',$reciever_id)
                  ->where('sender_id',$sender_id);
              
            });
        })
            ->where('message','!=','')
            ->orderBy('id','asc')
            ->get();
            return $query;
    
    }
    public function getConnectUser()
    {
    return $this->belongsTo(User::class,'connect_user_id');
    
    }

    static public function getChatUser($user_id)
    {
        $getuserchat = self::select("chats.*",DB::raw('(CASE WHEN chats.sender_id = "'.$user_id.'" 
        THEN chats.reciever_id ELSE chats.sender_id END) AS connect_user_id'))
        ->join('users as sender','sender.id','=','chats.sender_id')
        ->join('users as reciever','reciever.id','=','chats.reciever_id');

        if(!empty(Request::get('search')))
         {
           $search = Request::get('search');
           $getuserchat = $getuserchat->where(function($query) use($search){
            $query->where('sender.name','like','%'.$search.'%')
            ->orWhere('reciever.name','like',$search);
           });
         
         }
        $getuserchat = $getuserchat->whereIn('chats.id',function($query) use($user_id){
            $query->selectRaw('max(chats.id)')->from('chats')
            ->where('chats.status','<',2)
            ->where(function($query) use($user_id){
                $query->where('chats.sender_id','=',$user_id)
               ->orWhere(function($query) use($user_id){
              $query->where('chats.reciever_id','=',$user_id)
              ->where('chats.status','>','-1');
            });
            })
            ->groupBy(DB::raw('CASE WHEN chats.sender_id = "'.$user_id.'" 
            THEN chats.reciever_id ELSE sender_id END'));
        })
        ->orderBy('chats.id','desc')
        ->get();
        $result = array();
        
        foreach ($getuserchat as $value) {
            $data = array();
            $data['id'] = $value->id;
            $data['message'] = $value->message;
            $data['created_date'] = $value->created_date;
            $data['user_id'] = $value->connect_user_id;
            $data['is_online'] = $value->getConnectUser->OnlineUser();
            $data['name'] = $value->getConnectUser->name.' '.$value->getConnectUser->last_name;
            $data['prifile_pic'] = $value->getConnectUser->getProfileDirectory();
            $data['message_count'] = $value->CountMessage($value->connect_user_id, $user_id);
            $result[] = $data;
        }
       return $result;
    }
    static public function CountMessage($connect_user_id,$user_id)
    {
        return self::where('sender_id','=',$connect_user_id)->
        where('reciever_id','=',$user_id)->where('status','=',0)->count();
    }
    public function getSender()
        {
        return $this->belongsTo(User::class,'sender_id');
        }

        public function getReciever()
        {
        return $this->belongsTo(User::class,'reciever_id');
        }
    static public function updateCount($reciever_id,$sender_id)
    {
        self::where('sender_id','=',$reciever_id)->where('reciever_id','=',$sender_id)->where('status','=','0')->update(['status' => '1']);

    }

    public function getFile()
    {
        if(!empty($this->file) && file_exists('upload/chat/'.$this->file))
        {
            return url('upload/chat/'.$this->file);
        }
        else
        {
            return "";
        }
    }
    static public function MessageCountAll()
    {
        $user_id = Auth::user()->id;
        $return = self::select('chats.id')
        ->join('users as sender','sender.id','=','chats.sender_id')
        ->join('users as reciever','reciever.id','=','chats.reciever_id')
        ->where('chats.reciever_id','=',$user_id)
        ->where('chats.status','=',0)
        ->count();
        return $return;

    }
       
}
