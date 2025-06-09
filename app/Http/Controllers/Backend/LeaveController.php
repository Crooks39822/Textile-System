<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Exports\ENPFList;
use App\Models\LeaveType;
use Illuminate\Support\Str;
use App\Mail\UserCreateMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class LeaveController extends Controller
{
    public function list(Request $request)
    {
       $data['getLeaveType'] = LeaveType::getRecord();
      $data['getRecord'] = Leave::getRecord();
      $data['header_title'] = 'Employee Leave List';
       
        return view('backend/leave/list',$data);
    }

    public function add()
    {
      // $data['getRecord'] = Leave::getRecord();
      $data['getLeaveType'] = LeaveType::getRecord();
      $data['header_title'] = 'Add New Leave';
       return view('backend/leave/add',$data);
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
            $name = $value->name.' '.$value->last_name.'-'.$value->admission_number.'-'.$type;
            $json[] = ['id'=>$value->id, 'text'=>$name];
            }
        }
        echo json_encode($json);

    }
    public function register(Request $request)
    {
      
      $leave = new Leave;
      $leave->user_id  =trim($request->user_id);
      $leave->leave_type  =trim($request->leave_type);
      $leave->start_date  =trim($request->start_date);
      $leave->end_date  =trim($request->end_date);
      $leave->duration_type  =trim($request->duration_type);
      $leave->number_of_days  =trim($request->number_of_days);
      $leave->status  =trim($request->status);
      $leave->message  =trim($request->message);
     
    
      if(!empty($request->file('document_file')))
      {
        
        $ext =$request->file('document_file')->getClientoriginalExtension();
        $file =$request->file('document_file');
        $randomStr = date('Ymdhis');
        $filename =strtolower($randomStr).'.'.$ext;
        $file->move('upload/documents_leave/',$filename);
        $leave->document_file  =$filename;
      }

      $leave->save();
      

      return redirect('admin/leave/list')->with('success','Leave Successfully Added');

    }

    public function edit($id)
    {

      $data['getLeaveType'] = LeaveType::getRecord();
      $data['getRecord'] = Leave::getSingle($id);
      if(!empty($data['getRecord']))
      {

        $data['header_title'] = 'Edit Leave';
         return view('backend/leave/edit',$data);

      }
      else
      {

        abort(404);
      }


    }
    public function update($id, Request $request)
    {
     
        
      $leave = Leave::getSingle($id);
      
      $leave->leave_type  =trim($request->leave_type);
      $leave->start_date  =trim($request->start_date);
      $leave->end_date  =trim($request->end_date);
      $leave->duration_type  =trim($request->duration_type);
      $leave->number_of_days  =trim($request->number_of_days);
      $leave->status  =trim($request->status);
      $leave->message  =trim($request->message);
    
      if(!empty($request->file('document_file')))
        {
            if(!empty($leave->getDocument()))
          {
            unlink('upload/documents_leave/'.$leave->document_file);

          }
          
          $ext =$request->file('document_file')->getClientoriginalExtension();
          $file =$request->file('document_file');
          $randomStr = date('Ymdhis');
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/documents_leave/',$filename);
          $leave->document_file  =$filename;
        }
       
     

      $leave->save();
      

      return redirect('admin/leave/list')->with('success','Leave Successfully Update');

    }
    public function delete($id)
    {
      $getRecord = Leave::getSingle($id);
      if(!empty($getRecord))
      {
       
        $getRecord->delete();
        return redirect()->back()->with('success','Leave Successfully Deleted');
      }else
      {
        abort(404);
      }

    }

 
    




}
