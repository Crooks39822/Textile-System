<?php

namespace App\Http\Controllers\Backend;

use Excel;
use Carbon\Carbon;
use App\Models\Exam;
use App\Models\User;
use App\Models\Setting;
use App\Exports\ENPFList;
use App\Models\Classroom;
use Illuminate\Support\Str;
use App\Mail\UserCreateMail;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use App\Exports\EmployeeExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{

    public function list($id,Request $request)
    {
      
      $data['getEmpoyeeStatus'] = EmployeeStatus::getRecord();
      $data['getPosition'] =Exam::getRecord();
      $data['getClass'] = Classroom::getClass();
      $data['header_title'] = 'Employee List';
      $data['getStudent'] = User::getStudent();
      $data['getStudent'] = User::getEmployee($id);
       

        return view('backend/add_employee/list',$data);
    }

    public function employee_export(Request $request)
    {
      return Excel::download(new EmployeeExport,'EmployeeList_'.date('d-m-Y').'.xls');
      
    } 

    public function enpf_export(Request $request)
    {
      return Excel::download(new ENPFList,'ENPF_' .date('d-m-Y').'.xls');
      
    } 
    public function add()
    {
      $data['getPosition'] =Exam::getRecord();
      $data['getEmpoyeeStatus'] = EmployeeStatus::getRecord();
      $data['getClass'] = Classroom::getClass();
      $data['header_title'] = 'Add New Employee';
       return view('backend/add_employee/add',$data);
    }
    
    public function checkClockNumber(Request $request)
    {
        $clock_number = $request->input('admission_number');
        $isExists = User::where('admission_number','=', $clock_number)->first();

        if($isExists)
        {
         return response()->json(array("exists" => true));

        }else{
          return response()->json(array("exists" => false));
        }
    }

    public function checkEmployeeNumber(Request $request)
    {
        $employee_number = $request->input('id_number');
        $isExists = User::where('id_number','=', $employee_number)->first();

        if($isExists)
        {
         return response()->json(array("exists" => true));

        }else{
          return response()->json(array("exists" => false));
        }
    }

    public function insert(Request $request)
    {
      //dd($request->all());
      request()->validate([
        'name' => 'required',
        
        'class_id' => 'required',
        'employee_number' => 'required',
       'admission_date' => 'required',
        'last_name' => 'required',
        'phone' => 'min:8|unique:users',
        'id_number' => 'min:13|required|unique:users'
        ]);
        
      $user = new User;
       
     
      $user->qualification  =trim($request->qualification); 
      $admission_number = $request->employee_number;
      $user->name  =trim($request->name);
      $user->biometric_uid  = $admission_number;
      $user->marital_status  =trim($request->marital_status);
      $user->nxt_contact  =trim($request->nxt_contact);
      $user->nxt_name  =trim($request->nxt_name);
      $user->relationship  =trim($request->relationship);
      $user->id_number  =trim($request->id_number);
      $user->tax_number  =trim($request->tax_number);
      $user->academic_year_id  =trim($request->academic_year_id);
      $user->last_name  =trim($request->last_name);
      $user->admission_number  = $admission_number;
      $user->roll_number  =trim($request->roll_number);
      $user->class_id  =trim($request->class_id);
      $user->designation  =trim($request->designation);
      $user->gender  =trim($request->gender);
      $user->phone  =trim($request->phone);
       $user->qualification  =trim($request->qualification);
      if(!empty($request->date_of_birth))
        {
          $user->date_of_birth  =trim($request->date_of_birth);
        }

      $user->age  =trim($request->age);
    
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
        $probation_date =Carbon::parse(trim($request->admission_date))->addMonths(3);
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
      $user->is_role  = 3;
      $user->save();
      
      return redirect('admin/employee/0')->with('success','Employee Successfully Added');

    }

    public function edit($id)
    {

      
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {
        $data['getEmpoyeeStatus'] = EmployeeStatus::getRecord();
        $data['getPosition'] =Exam::getRecord();
        $data['getClass'] = Classroom::getClass();
       
        $data['header_title'] = 'Edit Employee';
         return view('backend/add_employee/edit',$data);

      }
      else
      {

        abort(404);
      }

    }

    public function employee_update($id,Request $request)
    {
             $user = DB::table('users')->select('is_delete')->where('id','=',$id)->first();
             if($user->is_delete == '1'){
 
                 $is_delete = '0';
             }else{
 
                 $is_delete = '1';
             }
             $values = array('is_delete' => $is_delete);
             DB::table('users')->where('id', $id)->update($values);
             
             return redirect()->back()->with('success','Employee Successfully Update');
     }
    public function update($id, Request $request)
    {
      request()->validate([
        'name' => 'required',
        'class_id' => 'required',
        'employee_number' => 'required',
        'last_name' => 'required',
        'phone' => 'min:8'
        ]);
       
       
      

      $user = User::getSingle($id);
      $user->name  =trim($request->name);
      $user->qualification  =trim($request->qualification);
      $user->marital_status  =trim($request->marital_status);
      $user->age  =trim($request->age);
      $user->nxt_contact  =trim($request->nxt_contact);
      $user->nxt_name  =trim($request->nxt_name);
      $user->relationship  =trim($request->relationship);
      $user->tax_number  =trim($request->tax_number);
      $user->admission_number  = trim($request->employee_number);
      $user->id_number  =trim($request->id_number);
      $user->last_name  =trim($request->last_name);
      $user->roll_number  =trim($request->roll_number);
      $user->class_id  =trim($request->class_id);
      $user->designation  =trim($request->designation);
      $user->gender  =trim($request->gender);
      $user->phone  =trim($request->phone);
      $user->is_delete  =trim($request->status);
      $user->bank_account  =trim($request->bank_account);
      $user->bank_name  =trim($request->bank_name);
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
       $user->qualification  =trim($request->qualification);
      if(!empty($request->date_of_birth))
        {
          $user->date_of_birth  =trim($request->date_of_birth);
        }
      
     
      
      $user->address  =trim($request->address);
      $user->previous_school  =trim($request->previous_school);
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


      return redirect('admin/employee/0')->with('success','Employee Successfully Update');

    }

    public function delete($id)
    {
      $getRecord = User::getSingle($id);
      if(!empty($getRecord))
      {
       
        $getRecord->delete();
        return redirect()->back()->with('success','Employee Successfully Deleted');
      }else
      {
        abort(404);
      }

    }
    public function view($id)
    {
      $employee = User::with('attendances')->find($id);
      $data['getAttendance'] = $employee;
      $data['getClass'] = User::getSingleClass($id);
      $data['getPosition'] =User::getStudent($id);
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {

        $data['header_title'] = 'Employee Profile';
         return view('backend/add_employee/view',$data);

      }
      else
      {

        abort(404);
      }


    }


//teacher work side
    public function My_Student()
    {
      $data['header_title'] = 'My Student List';
      $data['getStudent'] = User::getTeacherStudent(Auth::user()->id);
      return view('backend/teacher/my_student',$data);
    }


}
