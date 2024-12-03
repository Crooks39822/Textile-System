<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoticeBoard extends Model
{
    use HasFactory;
    protected $table = 'notice_boards';

static public function getRecord(){

        $return =self::select('notice_boards.*','users.name as created_by_name')
                         ->join('users','users.id','notice_boards.created_by');


                     //search box start
                    if(!empty(Request::get('title')))
                     {
                         $return = $return->where('notice_boards.title','like', '%' .Request::get('title').'%');
                     }


                     if(!empty(Request::get('start_notice_date')))
                     {
                         $return = $return->where('notice_boards.notice_date','>=', (Request::get('start_notice_date')));
                     }
                     if(!empty(Request::get('end_notice_date')))
                     {
                         $return = $return->where('notice_boards.notice_date','<=', (Request::get('end_notice_date')));
                     }

                     if(!empty(Request::get('start_publish_date')))
                     {
                         $return = $return->where('notice_boards.publish_date','>=', (Request::get('start_publish_date')));
                     }
                     if(!empty(Request::get('end_publish_date')))
                     {
                         $return = $return->where('notice_boards.publish_date','<=', (Request::get('end_publish_date')));
                     }

                     if(!empty(Request::get('message_to')))
                     {
                        $return = $return->join('notice_board_messages','notice_board_messages.notice_board_id','notice_boards.id');

                         $return = $return->where('notice_board_messages.message_to','=', (Request::get('message_to')));
                     }
                     //search box end

                     $return = $return->orderBy('notice_boards.id','desc')
                                    ->paginate(20);
                                return  $return;
    }

public function getMeassage()
        {
            return $this->hasMany(NoticeBoardMessage::class,"notice_board_id");
        }
static public function getSingle($id)
    {
        return self::find($id);
    }

public function getMessageToSingle($notice_board_id,$message_to)
    {
        return NoticeBoardMessage::where('notice_board_id','=',$notice_board_id)
                                ->where('message_to','=',$message_to)->first();
    }

    static public function getRecordUser($message_to)
    {
        $return =self::select('notice_boards.*','users.name as created_by_name')
        ->join('users','users.id','notice_boards.created_by');

        $return = $return->join('notice_board_messages','notice_board_messages.notice_board_id','=','notice_boards.id');

        if(!empty(Request::get('title')))
        {
            $return = $return->where('notice_boards.title','like', '%' .Request::get('title').'%');
        }


        if(!empty(Request::get('start_notice_date')))
        {
            $return = $return->where('notice_boards.notice_date','>=', (Request::get('start_notice_date')));
        }
        if(!empty(Request::get('end_notice_date')))
        {
            $return = $return->where('notice_boards.notice_date','<=', (Request::get('end_notice_date')));
        }
        $return = $return->where('notice_board_messages.message_to','=',$message_to);
        $return = $return->where('notice_boards.publish_date','>=', date('Y-m-d'));
        $return = $return->orderBy('notice_boards.id','desc')
        ->paginate(20);
       return  $return;

    }


    static public function getRecordUserCount($message_to)
    {
        $return =self::select('notice_boards.id')
        ->join('users','users.id','notice_boards.created_by');

        $return = $return->join('notice_board_messages','notice_board_messages.notice_board_id','=','notice_boards.id');

         $return = $return->where('notice_board_messages.message_to','=',$message_to);
        $return = $return->where('notice_boards.publish_date','>=', date('Y-m-d'))
           ->count();
       return  $return;

    }
}
