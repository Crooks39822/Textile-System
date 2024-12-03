<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function change_password()
    {

        $data['header_title'] = 'Change  Password';
        return view('backend/profile/change_password',$data); 
    }

    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = 'My Account';
        if(Auth::user()->is_role == 2)
        {
            return view('backend/teacher/my_account',$data);    
        }
        elseif(Auth::user()->is_role == 3)
        {
            return view('backend/student/my_account',$data);
        }
        elseif(Auth::user()->is_role == 4)
        {
            return view('backend/parent/my_account',$data);
        }

        elseif(Auth::user()->is_role == 1)
        {
            return view('backend/users/my_account',$data);
        }
        
    }
    public function UpdateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;
    request()->validate([
        'email' => 'required|email|unique:users,email,'.$id,
         'phone' => 'min:8'
        ]);

      $user                 = User::getSingle($id);
      $user->name           = trim($request->name);
      $user->last_name      = trim($request->last_name);
      $user->phone          = trim($request->phone);
      $user->email          = trim($request->email);
      
      
      $user->remember_token = Str::random(50);

      $user->save();
      return redirect()->back()->with('success',"Information Succesfully Updated");
    }
    public function UpdateMyAccountParent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
             'phone' => 'min:8'
            ]);
          $parent = User::getSingle($id);
          $parent->name  =trim($request->name);
          $parent->last_name  =trim($request->last_name);
          $parent->gender  =trim($request->gender);
          $parent->phone  =trim($request->phone);
          $parent->address  =trim($request->address);
          $parent->occupation  =trim($request->occupation);
         
            if(!empty($request->file('avatar')))
            {
              if(!empty($parent->getProfile()))
              {
                unlink('upload/profile/'.$parent->avatar);
                
              }
              $ext =$request->file('avatar')->getClientoriginalExtension();
              $file =$request->file('avatar');
              $randomStr = date('Ymdhis');
              $filename =strtolower($randomStr).'.'.$ext;
              $file->move('upload/profile/',$filename);
              $parent->avatar  =$filename;
            }
          
         
          $parent->email  =trim($request->email);
         
          
          
           $parent->save();
    
           return redirect()->back()->with('success',"Information Succesfully Updated");



    }



    public function UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'id_number' => 'max:13|min:13',
            'phone' => 'min:8'
            ]);
          $student = User::getSingle($id);
          $student->name  =trim($request->name);
          $student->last_name  =trim($request->last_name);
           $student->gender  =trim($request->gender);
          $student->phone  =trim($request->phone);
          if(!empty($request->date_of_birth))
            {
              $student->date_of_birth  =trim($request->date_of_birth);
            }
          
          $student->age  =trim($request->age);
          $student->id_number  =trim($request->id_number);
          $student->address  =trim($request->address);
          
         
            if(!empty($request->file('avatar')))
            {
              if(!empty($student->getProfile()))
              {
                unlink('upload/profile/'.$student->avatar);
                
              }
              $ext =$request->file('avatar')->getClientoriginalExtension();
              $file =$request->file('avatar');
              $randomStr = date('Ymdhis');
              $filename =strtolower($randomStr).'.'.$ext;
              $file->move('upload/profile/',$filename);
              $student->avatar  =$filename;
            }
          
         
          $student->email  =trim($request->email);
          $student->save();
          return redirect()->back()->with('success',"Information Succesfully Updated");
           
    }

    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'id_number' => 'max:13|min:13',
            'phone' => 'min:8'
            ]);
          $teacher = User::getSingle($id);
          $teacher->name  =trim($request->name);
          $teacher->last_name  =trim($request->last_name);
          
          $teacher->qualification  =trim($request->qualification);
          $teacher->work_experience  =trim($request->work_experience);
          $teacher->gender  =trim($request->gender);
          $teacher->phone  =trim($request->phone);
          if(!empty($request->date_of_birth))
            {
              $teacher->date_of_birth  =trim($request->date_of_birth);
            }
          
          $teacher->occupation  =trim($request->occupation);
          $teacher->id_number  =trim($request->id_number);
          $teacher->address  =trim($request->address);
          $teacher->p_address  =trim($request->p_address);
          $teacher->marital_status  =trim($request->marital_status);
          
            if(!empty($request->file('avatar')))
            {
              if(!empty($teacher->getProfile()))
              {
                unlink('upload/profile/'.$teacher->avatar);
                
              }
    
              $ext =$request->file('avatar')->getClientoriginalExtension();
              $file =$request->file('avatar');
              $randomStr = date('Ymdhis').Str::random(20);
              $filename =strtolower($randomStr).'.'.$ext;
              $file->move('upload/profile/',$filename);
              $teacher->avatar  =$filename;
            }
          
         
          $teacher->email  =trim($request->email);
         
          
          $teacher->save();
    
          return redirect()->back()->with('success',"Information Succesfully Updated");

    }

    
    public function update_change_password(Request $request)
    {
            //dd($request->all());
            $user = User::getSingle(Auth::user()->id);
            if(Hash::check($request->old_password, $user->password))
                {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('success',"Password Succesfully Updated");	

                }
                else
                {
                    return redirect()->back()->with('error',"Old Password is not Correct");
                }

    }
   
}
