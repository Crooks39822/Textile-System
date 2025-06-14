<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Disciplinary;
use App\Exports\ENPFList;
use App\Models\ActionType;
use Illuminate\Support\Str;
use App\Mail\UserCreateMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class DisciplinaryController extends Controller
{
    public function list(Request $request)
    {
       $data['getLeaveType'] = ActionType::getRecord();
      $data['getRecord'] = Disciplinary::getRecord();
      $data['header_title'] = 'Employee Disciplinary List';
       
        return view('backend/disciplinary_action/list',$data);
    }

    public function add()
    {
      // $data['getRecord'] = Leave::getRecord();
      $data['getActionType'] = ActionType::getRecord();
      $data['header_title'] = 'Add New Disciplinary Action';
       return view('backend/disciplinary_action/add',$data);
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
    public function insert(Request $request)
    {
      
      $leave = new Disciplinary;
      $leave->user_id  =trim($request->user_id);
      $leave->actiontype  =trim($request->actiontype);
      $leave->start_date  =trim($request->start_date);
      // $leave->end_date  =trim($request->end_date);
      
      $leave->message  =trim($request->message);
     
    
      if(!empty($request->file('document_file')))
      {
        
        $ext =$request->file('document_file')->getClientoriginalExtension();
        $file =$request->file('document_file');
        $randomStr = date('Ymdhis');
        $filename =strtolower($randomStr).'.'.$ext;
        $file->move('upload/documents_action/',$filename);
        $leave->document_file  =$filename;
      }

      $leave->save();
      

      return redirect('admin/employees/disciplinary/list')->with('success','Disciplinary Successfully Added');

    }

    public function edit($id)
    {

      $data['getActionType'] = ActionType::getRecord();
      $data['getRecord'] = Disciplinary::getSingle($id);
      if(!empty($data['getRecord']))
      {

        $data['header_title'] = 'Edit Disciplinary';
         return view('backend/disciplinary_action/edit',$data);

      }
      else
      {

        abort(404);
      }


    }
    public function update($id, Request $request)
    {
     
        
      $leave = Disciplinary::getSingle($id);
      
      $leave->actiontype  =trim($request->actiontype);
      $leave->start_date  =trim($request->start_date);
      // $leave->end_date  =trim($request->end_date);
      
      $leave->message  =trim($request->message);
    
      if(!empty($request->file('document_file')))
        {
            if(!empty($leave->getDocument()))
          {
            unlink('upload/documents_action/'.$leave->document_file);

          }
          
          $ext =$request->file('document_file')->getClientoriginalExtension();
          $file =$request->file('document_file');
          $randomStr = date('Ymdhis');
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/documents_action/',$filename);
          $leave->document_file  =$filename;
        }
       
     

      $leave->save();
      

      return redirect('admin/employees/disciplinary/list')->with('success','Disciplinary Successfully Update');

    }
    public function delete($id)
    {
      $getRecord = Disciplinary::getSingle($id);
      if(!empty($getRecord))
      {
       
        $getRecord->delete();
        return redirect()->back()->with('success','Disciplinary Successfully Deleted');
      }else
      {
        abort(404);
      }

    }

 
    




}
