<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Mail\UserCreateMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersContoller extends Controller
{
    public function index(Request $request)
    {
      $data['header_title'] = 'Admin List';
        $data['getRecord'] = User::getRecord();
        return view('backend/users/listusers',$data);
    }

    public function user_add(Request $request){
      $data['header_title'] = 'Add Admin';
        return view('backend/users/add',$data);
    }
    public function user_edit($id)
    {
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {

        $data['header_title'] = 'Edit Admin';
      return view('backend/users/edit',$data);

      }
      else
      {
        abort(404);
      }

    }
    public function delete()
    {
      $data['header_title'] = 'Delete Admin';
      return view('backend/users/add',$data);
    }
      public function register_users(Request $request)
    {
      // dd($request->all());
      $user = request()->validate([

        'name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'password' => 'required|min:6',
         'confirm_password' => 'required_with:password|same:password|min:6',
        'email' => 'required|unique:users'
        ]);

      $user                 = new User;
      $user->name           = trim($request->name);
      $user->last_name      = trim($request->last_name);
      $user->phone          = trim($request->phone);
      $user->email          = trim($request->email);
      $user->is_role          = 1;
      if(!empty($request->password))
      {
        $randome_password =$request->password;

        $user->password       = Hash::make($randome_password);
      }

      $user->save();
      $user->randome_password =$randome_password;
      Mail::to($user->email)->send(new UserCreateMail($user));

      return redirect('admin/users')->with('success','Registered Successfully');
    }

    public function user_update($id,Request $request)
    {
      // dd($request->all());
      $user = request()->validate([
        'email' => 'required|email|unique:users,email,'.$id
        ]);

      $user                 = User::getSingle($id);
      $user->name           = trim($request->name);
      $user->last_name      = trim($request->last_name);
      $user->phone          = trim($request->phone);
      $user->email          = trim($request->email);
    
      if(!empty($request->password))
      {
        $user->password       = Hash::make($request->password);
      }

      $user->remember_token = Str::random(50);

      $user->save();
      return redirect('admin/users')->with('success','Updated Successfully');
    }
    public function user_delete($id)
    {
      $user                 = User::getSingle($id);
      $user->is_delete        = 1;
      $user->save();
      return redirect('/admin/users')->with('success','Deleted Successfully');
    }

    public function settings()
    {
      $data['getRecord'] = Setting::getSingle();
      $data['header_title'] = 'Settings';
     
      return view('backend/settings',$data);
    }


    public function Updatesettings(Request $request)
    {
      $settings = Setting::getSingle();
      $settings->name = trim($request->name);
      
      
      
      if(!empty($request->file('logo')))
      {
        
        $ext =$request->file('logo')->getClientoriginalExtension();
        $file =$request->file('logo');
        $randomStr = date('Ymdhis');
        $filename =strtolower($randomStr).'.'.$ext;
        $file->move('upload/logo/',$filename);
        $settings->logo  =$filename;
      }

      if(!empty($request->file('favicon')))
      {
        
        $ext =$request->file('favicon')->getClientoriginalExtension();
        $file =$request->file('favicon');
        $randomStr = date('Ymdhis');
        $filename =strtolower($randomStr).'.'.$ext;
        $file->move('upload/favicon/',$filename);
        $settings->favicon  =$filename;
      }
      $settings->save();
      return redirect()->back()->with('success','Settings Saved Successfully');
    }
}
