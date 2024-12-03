<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Classroom::getRecord();
        $data['header_title'] = 'Department List';
        return view('backend/department/list',$data);
       
    }
    public function add()
    {
        $data['header_title'] = 'Add New Department';
        return view('backend/department/add',$data);
        
       
    }
    public function edit($id)
    {
        $data['getRecord'] = Classroom::getSingle($id);
        

        if(!empty($data['getRecord']))
        {
             
            
            $data['header_title'] = 'Edit Department';
            return view('backend/department/edit',$data); 
  
        }
        else
        {
        abort(404);
        }
       
        
       
    }
    public function register(Request $request)
    {
       // dd($request->all());
       $class                 = new Classroom;
       $class->name           = trim($request->name);
       $class->status      = trim($request->status);
       $class->created_by =Auth::user()->id;
    
       $class->save();
       return redirect('admin/department')->with('success','Department Successfully Created');
       
        
       
    }
    public function update($id,Request $request)
    {
      // dd($request->all());
     
      $class                 = Classroom::getSingle($id);
      $class->name           = trim($request->name);
      $class->status      = trim($request->status);
      

      $class->save();
      return redirect('admin/department')->with('success','Department Updated Successfully');
    }
    public function delete($id)
    {
      $class                 = Classroom::getSingle($id);
      $class->is_delete        = 1;
      $class->save();
      return redirect('admin/department')->with('success','Department Deleted Successfully');
    }
    
}
