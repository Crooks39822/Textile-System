<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Setting;
use App\Models\Classroom;
use Illuminate\Support\Str;
use App\Mail\UserCreateMail;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class QCsController extends Controller
{
   
    public function list(Request $request)
    {
      $data['getClass'] = Classroom::getClass();
      $data['header_title'] = 'QC List';
        $data['getStudent'] = User::getQC();
       

        return view('backend/add_qc/list',$data);
    }
    public function add()
    {
      
      $data['getClass'] = Classroom::getClass();
      $data['header_title'] = 'Add New QC';
       return view('backend/add_qc/add',$data);
    }
    public function insert(Request $request)
    {
      //dd($request->all());
      request()->validate([
        'name' => 'required',
        'class_id' => 'required',
        'last_name' => 'required',
         'class_id' => 'required',
        'admission_date' => 'required',
        'last_name' => 'required',
        'phone' => 'min:8|unique:users',
        'admission_number' => 'required|unique:users'
        ]);
        
      $user = new User;
       
      $idno=$request->id_number;
      $admission_number = $request->admission_number;
      $user->name  =trim($request->name);
      $user->academic_year_id  =trim($request->academic_year_id);
      $user->last_name  =trim($request->last_name);
      $user->admission_number  = $admission_number;
      $user->roll_number  =trim($request->roll_number);
      $user->class_id  =trim($request->class_id);
      $user->gender  =trim($request->gender);
      $user->phone  =trim($request->phone);
      if(!empty($request->date_of_birth))
        {
          $user->date_of_birth  =trim($request->date_of_birth);
        }

      $user->age  =trim($request->age);
      $user->id_number  =trim($request->id_number);
      $user->address  =trim($request->address);
      $user->previous_school  =trim($request->previous_school);
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
      $user->is_role  = 4;
      $user->save();
      
      return redirect('admin/qc')->with('success','QC Successfully Added');

    }

    public function edit($id)
    {


      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {
        $data['getClass'] = Classroom::getClass();
       
        $data['header_title'] = 'Edit QC';
         return view('backend/add_qc/edit',$data);

      }
      else
      {

        abort(404);
      }

    }
    public function update($id, Request $request)
    {
      request()->validate([
        'name' => 'required',
        'class_id' => 'required',
        'last_name' => 'required',
        'phone' => 'min:8'
        ]);

      $user = User::getSingle($id);
      $user->name  =trim($request->name);
      $user->last_name  =trim($request->last_name);
      $user->roll_number  =trim($request->roll_number);
      $user->admission_number  = trim($request->admission_number);
      $user->class_id  =trim($request->class_id);
      $user->gender  =trim($request->gender);
      $user->phone  =trim($request->phone);
      if(!empty($request->date_of_birth))
        {
          $user->date_of_birth  =trim($request->date_of_birth);
        }
        
      $user->probation_status  =trim($request->probation_status);
      $user->age  =trim($request->age);
      $user->id_number  =trim($request->id_number);
      $user->address  =trim($request->address);
      $user->previous_school  =trim($request->previous_school);
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
          $randomStr = date('Ymdhis');
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/profile/',$filename);
          $user->avatar  =$filename;
        }
        $probation_date =Carbon::parse(trim($request->admission_date))->addMonths(3);
        $user->probation_date  =$probation_date;
      $user->status  =trim($request->status);
      $user->save();


      return redirect('admin/qc')->with('success','QC Successfully Update');

    }

    public function delete($id)
    {
      $getRecord = User::getSingle($id);
      if(!empty($getRecord))
      {
        $getRecord->is_delete = 1;
        $getRecord->save();
        return redirect()->back()->with('success','QC Successfully Deleted');
      }else
      {
        abort(404);
      }

    }
    public function view($id)
    {

      $data['getClass'] = User::getSingleClass($id);
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {

        $data['header_title'] = 'Qc Profile';
         return view('backend/add_qc/view',$data);

      }
      else
      {

        abort(404);
      }


    }


}
