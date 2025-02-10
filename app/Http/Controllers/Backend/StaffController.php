<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Exports\ENPFList;
use Illuminate\Support\Str;
use App\Mail\UserCreateMail;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Excel;

class StaffController extends Controller
{
    public function list(Request $request)
    {
      $data['getRecords'] = AcademicYear::getRecord();
      $data['header_title'] = 'Admin Staff List';
        $data['getRecord'] = User::getParent();
        return view('backend/add_staff/list',$data);
    }

    public function add()
    {
      $data['getRecord'] = AcademicYear::getRecord();
      $data['header_title'] = 'Add New Staff';
       return view('backend/add_staff/add',$data);
    }
    public function insert(Request $request)
    {
      //dd($request->all());
      request()->validate([
        'employee_number' => 'required',
                'phone' => 'min:8'
        ]);
      $user = new User;
      $user->name  =trim($request->name);
      $user->last_name  =trim($request->last_name);
      $user->age  =trim($request->age);
      $user->nxt_contact  =trim($request->nxt_contact);
      $user->nxt_name  =trim($request->nxt_name);
      $user->relationship  =trim($request->relationship);
      $user->tax_number  =trim($request->tax_number);
      $user->admission_number  = trim($request->employee_number);
      $user->gender  =trim($request->gender);
      $user->phone  =trim($request->phone);
      $user->qualification  =trim($request->qualification);
      $user->roll_number  =trim($request->roll_number);
      $user->occupation  =trim($request->occupation);
      $user->address  =trim($request->address);
      $user->bank_account  =trim($request->bank_account);
      $user->bank_name  =trim($request->bank_name);
      if(!empty($request->file('document_file')))
      {
        
        $ext =$request->file('document_file')->getClientoriginalExtension();
        $file =$request->file('document_file');
        $randomStr = date('Ymdhis');
        $filename =strtolower($randomStr).'.'.$ext;
        $file->move('upload/documents/',$filename);
        $user->document_file  =$filename;
      }


        if(!empty($request->file('avatar')))
        {


          $ext =$request->file('avatar')->getClientoriginalExtension();
          $file =$request->file('avatar');
          $randomStr = date('Ymdhis').Str::random(20);
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/profile/',$filename);
          $user->avatar  =$filename;
        }
        if(!empty($request->admission_date))
        {
          $user->admission_date  =trim($request->admission_date);
        }
        $probation_date =Carbon::parse(trim($request->admission_date))->addMonths(3);
        $user->probation_date  =$probation_date;
        if(!empty($request->date_of_birth))
        {
          $user->date_of_birth  =trim($request->date_of_birth);
        }
      $user->marital_status  =trim($request->marital_status);
      
      $user->id_number  =trim($request->id_number);
      $user->status  =trim($request->status);
      $user->is_role  = 5;
      

      $user->save();
      

      return redirect('admin/staff')->with('success','Staff Successfully Added');

    }

    public function edit($id)
    {

      $data['getRecords'] = AcademicYear::getRecord();
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {

        $data['header_title'] = 'Edit Staff';
         return view('backend/add_staff/edit',$data);

      }
      else
      {

        abort(404);
      }


    }
    public function update($id, Request $request)
    {
      request()->validate([
                 'phone' => 'min:8'
        ]);
        
      $user = User::getSingle($id);
      $user->name  =trim($request->name);
      $user->last_name  =trim($request->last_name);
      $user->gender  =trim($request->gender);
      $user->phone  =trim($request->phone);
      $user->roll_number  =trim($request->roll_number);
      $user->address  =trim($request->address);
      $user->age  =trim($request->age);
      $user->qualification  =trim($request->qualification);
      $user->nxt_contact  =trim($request->nxt_contact);
      $user->nxt_name  =trim($request->nxt_name);
      $user->relationship  =trim($request->relationship);
      $user->tax_number  =trim($request->tax_number);
      $user->admission_number  = trim($request->employee_number);
      $user->occupation  =trim($request->occupation);
      $user->probation_status  =trim($request->probation_status);
      $user->bank_account  =trim($request->bank_account);
      $user->bank_name  =trim($request->bank_name);
      if(!empty($request->file('document_file')))
        {
            if(!empty($user->getDocument()))
          {
            unlink('upload/documents/'.$user->document_file);

          }
          
          $ext =$request->file('document_file')->getClientoriginalExtension();
          $file =$request->file('document_file');
          $randomStr = date('Ymdhis');
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/documents/',$filename);
          $user->document_file  =$filename;
        }
        if(!empty($request->file('avatar')))
        {
          if(!empty($user->getProfile()))
          {
            unlink('upload/profile/'.$user->avatar);

          }
          $ext =$request->file('avatar')->getClientoriginalExtension();
          $file =$request->file('avatar');
          $randomStr = date('Ymdhis');
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/profile/',$filename);
          $user->avatar  =$filename;
        }
      $user->status  =trim($request->status);
      if(!empty($request->admission_date))
      {
        $user->admission_date  =trim($request->admission_date);
      }
      $probation_date =Carbon::parse(trim($request->admission_date))->addMonths(3);
      $user->probation_date  =$probation_date;

      if(!empty($request->date_of_birth))
        {
          $user->date_of_birth  =trim($request->date_of_birth);
        }
      $user->marital_status  =trim($request->marital_status);
      
      $user->id_number  =trim($request->id_number);

      $user->save();
      

      return redirect('admin/staff')->with('success','Staff Successfully Update');

    }
    public function delete($id)
    {
      $getRecord = User::getSingle($id);
      if(!empty($getRecord))
      {
        $getRecord->is_delete = 1;
        $getRecord->save();
        return redirect()->back()->with('success','Staff Successfully Deleted');
      }else
      {
        abort(404);
      }

    }

  
    public function view($id)
    {
      
$data['getClass'] = User::getSingleMember($id);
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {

        $data['header_title'] = 'Admin Staff Profile';
         return view('backend/add_staff/view',$data);

      }
      else
      {

        abort(404);
      }


    }




}
