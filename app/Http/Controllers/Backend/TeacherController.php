<?php

namespace App\Http\Controllers\Backend;

use Excel;
use Carbon\Carbon;
use App\Models\User;
use App\Exports\ENPFList;
use Illuminate\Support\Str;
use App\Mail\UserCreateMail;
use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    public function list($id)
    {
      $data['getEmpoyeeStatus'] = EmployeeStatus::getRecord();
		$data['getTeacher'] = User::getTeacher($id);
		$data['header_title'] = "Supervisor List";
		return view('backend.add_supervisor.list',$data);

    }

    public function add()
    {
      $data['getEmpoyeeStatus'] = EmployeeStatus::getRecord();
    $data['header_title'] = "Add New Supervisor";
		return view('backend.add_supervisor.add',$data);
    }
    public function insert(Request $request)
    {
      
      //dd($request->all());
      request()->validate([
        'id_number' => 'max:13|min:13',
        'employee_number' => 'required',  
        'phone' => 'min:8'
        ]);
      $user = new User;
      $user->name  =trim($request->name);
      $user->last_name  =trim($request->last_name);
      $user->note  =trim($request->note);
      $user->qualification  =trim($request->qualification);
      $user->work_experience  =trim($request->work_experience);
      $user->gender  =trim($request->gender);
      $user->phone  =trim($request->phone);
      $user->age  =trim($request->age);
      $user->nxt_contact  =trim($request->nxt_contact);
      $user->nxt_name  =trim($request->nxt_name);
      $user->relationship  =trim($request->relationship);
      $user->tax_number  =trim($request->tax_number);
      $user->admission_number  = trim($request->employee_number);
      if(!empty($request->file('document_file')))
      {
        
        $ext =$request->file('document_file')->getClientoriginalExtension();
        $file =$request->file('document_file');
        $randomStr = date('Ymdhis');
        $filename =strtolower($randomStr).'.'.$ext;
        $file->move('upload/documents/',$filename);
        $user->document_file  =$filename;
      }
      if(!empty($request->date_of_birth))
        {
          $user->date_of_birth  =trim($request->date_of_birth);
        }

      $user->occupation  =trim($request->occupation);
      $user->id_number  =trim($request->id_number);
      $user->roll_number  =trim($request->roll_number);
      $user->address  =trim($request->address);
      $user->p_address  =trim($request->p_address);
      $user->probation_status  =trim($request->probation_status);
      $user->marital_status  =trim($request->marital_status);
      $user->bank_account  =trim($request->bank_account);
      $user->bank_name  =trim($request->bank_name);
      if(!empty($request->admission_date))
        {
          $user->admission_date  =trim($request->admission_date);
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


        $probation_date =Carbon::parse(trim($request->admission_date))->addMonths(3);
        $user->probation_date  =$probation_date;

        $user->status  =trim($request->status);
        $user->is_delete  =trim($request->status);
      $user->is_role  = 2;
      

      $user->save();
      

      return redirect('admin/supervisor/0')->with('success','Supervisor Successfully Added');

    }
    public function edit($id)
    {


      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {
        $data['getEmpoyeeStatus'] = EmployeeStatus::getRecord();
        $data['header_title'] = 'Edit Supervisor';
         return view('backend/add_supervisor/edit',$data);

      }
      else
      {

        abort(404);
      }


    }
    public function view($id)
    {

      $data['getEmpoyeeStatus'] = EmployeeStatus::getRecord();
      $data['getSingleSuper'] = User::getSingleSuper($id);
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {

        $data['header_title'] = 'Supervisor Profile';
         return view('backend/add_supervisor/view',$data);

      }
      else
      {

        abort(404);
      }


    }

    public function update($id, Request $request)
    {
      request()->validate([
        'id_number' => 'max:13|min:13',
        'phone' => 'min:8'
        ]);
      $user = User::getSingle($id);
      $user->name  =trim($request->name);
      $user->last_name  =trim($request->last_name);
      $user->note  =trim($request->note);
      $user->roll_number  =trim($request->roll_number);
      $user->qualification  =trim($request->qualification);
      $user->work_experience  =trim($request->work_experience);
      $user->gender  =trim($request->gender);
      $user->phone  =trim($request->phone);
      $user->bank_account  =trim($request->bank_account);
      $user->bank_name  =trim($request->bank_name);
      $user->age  =trim($request->age);
     
      $user->nxt_contact  =trim($request->nxt_contact);
      $user->nxt_name  =trim($request->nxt_name);
      $user->relationship  =trim($request->relationship);
      $user->tax_number  =trim($request->tax_number);
      $user->admission_number  = trim($request->employee_number);
      if(!empty($request->new_rate))
      {
       $user->new_rate  =trim($request->new_rate);   
        $user->probation_status  = 1;  
      }
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
      if(!empty($request->date_of_birth))
        {
          $user->date_of_birth  =trim($request->date_of_birth);
        }

      $user->occupation  =trim($request->occupation);
      $user->id_number  =trim($request->id_number);
      $user->address  =trim($request->address);
      $user->p_address  =trim($request->p_address);
      $user->marital_status  =trim($request->marital_status);
      if(!empty($request->admission_date))
        {
          $user->admission_date  =trim($request->admission_date);
        }
        if(!empty($request->file('avatar')))
        {
          if(!empty($user->getProfile()))
          {
            unlink('upload/profile/'.$user->avatar);

          }

          $ext =$request->file('avatar')->getClientoriginalExtension();
          $file =$request->file('avatar');
          $randomStr = date('Ymdhis').Str::random(20);
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/profile/',$filename);
          $user->avatar  =$filename;
        }


      $user->email  =trim($request->email);
      if(!empty($request->password))
      {
        $randome_password =$request->password;

        $user->password       = Hash::make($randome_password);
      }
      $probation_date =Carbon::parse(trim($request->admission_date))->addMonths(3);
      $user->probation_date  =$probation_date;
      $user->is_delete  =trim($request->status);
      $user->status  =trim($request->status);

      $user->save();
     

      return redirect('admin/supervisor/0')->with('success','Supervisor Successfully Updated');


    }

    public function delete($id)
    {
      $getRecord = User::getSingle($id);
      if(!empty($getRecord))
      {
        
        $getRecord->delete();
        return redirect()->back()->with('success','Supervisor Successfully Deleted');
      }else
      {
        abort(404);
      }

    }


}
