<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\NoticeBoard;
use Illuminate\Http\Request;
use App\Mail\SendEmailUserMail;
use App\Models\NoticeBoardMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommunicateController extends Controller
{
    public function NoticeBoard()
    {
        $data['getRecord'] = NoticeBoard::getRecord();
              $data['header_title'] = 'Notice Board ';

        return view('backend/communicate/notice_board',$data);
    }

    public function SearchUser(Request $request)
    {
        $json = array();
        if(!empty($request->search))
        {
            $getUser = User::SearchUser($request->search);
            foreach($getUser as $value)
            {
            $type = '';
            if($value->is_role == 1)
            {
                $type = 'Admin';
            }
            elseif($value->is_role == 2)
            {
                $type = 'Supervisor';
            }
            elseif($value->is_role == 3)
            {
                $type = 'Employee';
            }
            elseif($value->is_role == 4)
            {
                $type = 'Parent';
            }
            $name = $value->name.' '.$value->last_name.'- '.$type;
            $json[] = ['id'=>$value->id, 'text'=>$name];
            }
        }
        echo json_encode($json);

    }
    public function SendEmailUser(Request $request)
    {
        if(!empty($request->user_id))
        {
            $user = User::getSingle($request->user_id);
            $user->send_message = $request->message;
            $user->send_subject = $request->subject;
            Mail::to($user->email)->send(new SendEmailUserMail($user));
           
        }

        if(!empty($request->message_to))
        {
            foreach($request->message_to as $user_type)
            {
                $getUser = User::getUser($user_type);
                //dd($getUser);
                foreach($getUser as $user)
                {
                    $user->send_message = $request->message;
                    $user->send_subject = $request->subject;
                    Mail::to($user->email)->send(new SendEmailUserMail($user));
                }
            }
        }
        return redirect()->back()->with('success','Email Successfully Sent!');
    }
    //send email
    public function SendEmail()
    {
        
        $data['header_title'] = 'Send Email ';

        return view('backend/communicate/send_email',$data);
    }
    

    public function AddNoticeBoard()
    {
        $data['header_title'] = 'Add Notice Board ';

        return view('backend/communicate/notice_board_add',$data);
    }

    public function NoticeBoardInsert(Request $request)
    {
       $save                 = new NoticeBoard;
       $save->title          = $request->title;
       $save->notice_date    = $request->notice_date;
       $save->publish_date   = $request->publish_date;
       $save->message        = $request->message;
       $save->created_by       = Auth::user()->id;
       $save->save();
       if(!empty($request->message_to))
       {

            foreach($request->message_to as $message_to)
            {

            $message = new NoticeBoardMessage;
            $message->notice_board_id = $save->id;
            $message->message_to =  $message_to;
            $message->save();
            }
       }


       return redirect('admin/communicate/notice_board')->with('success','Notice Board Successfully Added');
    }

    public function NoticeBoardEdit($id)
    {
        $data['getRecord'] = NoticeBoard::getSingle($id);
        $data['header_title'] = 'Edit Notice Board ';

        return view('backend/communicate/notice_board_edit',$data);
    }
    public function NoticeBoardUpdate($id,Request $request)
    {
       $save                 = NoticeBoard::getSingle($id);
       $save->title          = $request->title;
       $save->notice_date    = $request->notice_date;
       $save->publish_date   = $request->publish_date;
       $save->message        = $request->message;
       $save->created_by       = Auth::user()->id;
       $save->save();

       NoticeBoardMessage::DeleteRecord($id);
       if(!empty($request->message_to))
       {

            foreach($request->message_to as $message_to)
            {

            $message = new NoticeBoardMessage;
            $message->notice_board_id = $save->id;
            $message->message_to =  $message_to;
            $message->save();
            }
       }


       return redirect('admin/communicate/notice_board')->with('success','Notice Board Successfully Updated');
    }
public function NoticeBoardDelete($id)
{
    $save                 = NoticeBoard::getSingle($id);
    $save->delete();
    NoticeBoardMessage::DeleteRecord($id);
    return redirect()->back()->with('success','Notice Board Successfully Deleted');

}
    public function MyNoticeBoard()
{
    $data['getRecord'] = NoticeBoard::getRecordUser(Auth::user()->is_role);
    $data['header_title'] = 'My Notice Board ';

    return view('backend/student/my_notice_board',$data);

}
public function MyNoticeBoardTeacher()
{
    $data['getRecord'] = NoticeBoard::getRecordUser(Auth::user()->is_role);
    $data['header_title'] = 'My Notice Board ';

    return view('backend/teacher/my_notice_board',$data);

}
public function MyNoticeBoardParent()
{
    $data['getRecord'] = NoticeBoard::getRecordUser(Auth::user()->is_role);
    $data['header_title'] = 'My Notice Board ';

    return view('backend/parent/my_notice_board',$data);

}
public function MyStudentNoticeBoardParent()
{
    $data['getRecord'] = NoticeBoard::getRecordUser(3);
    $data['header_title'] = 'My Notice Board ';

    return view('backend/parent/my_student_notice_board',$data);

}



}
