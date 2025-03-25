<?php

namespace App\Http\Controllers\Backend;

use App\Models\EmployeeStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeStatusController extends Controller
{
    
    public function list()
    {
        $data['getRecord'] = EmployeeStatus::getRecord();
              $data['header_title'] = 'Employee Status';

        return view('backend/employee_status/list',$data);
    }
    public function add()
    {
        $data['header_title'] = 'Add New Employee Status';
        return view('backend/employee_status/add',$data);
        
       
    }

    public function insert(Request $request)
    {
       // dd($request->all());
       $employee_status                 = new EmployeeStatus;
       $employee_status->name           = trim($request->name);
       $employee_status->status      = trim($request->status);
       $employee_status->created_by =Auth::user()->id;
    
       $employee_status->save();
       return redirect('admin/employee_status')->with('success',' Employee Status Successfully Created');
       
    }
    public function edit($id)
    {
        $data['getRecord'] = EmployeeStatus::getSingle($id);
        if(!empty($data['getRecord']))
        {
            
            $data['header_title'] = 'Edit Employee Status';
            return view('backend/employee_status/edit',$data); 
  
        }
        else
        {
        abort(404);
        }
       
        
       
    }

    public function update($id,Request $request)
    {
      // dd($request->all());
     
      $employee_status                 = EmployeeStatus::getSingle($id);
      $employee_status->name           = trim($request->name);
      $employee_status->status      = trim($request->status);
      

      $employee_status->save();
      return redirect('admin/employee_status')->with('success','Employee Status Updated Successfully');
    }

    public function delete($id)
{
    $employee_status                 = EmployeeStatus::getSingle($id);
    $employee_status->delete();
    
    return redirect()->back()->with('success','Employee Status Successfully Deleted');

}
}
