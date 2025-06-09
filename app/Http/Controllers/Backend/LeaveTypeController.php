<?php

namespace App\Http\Controllers\Backend;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeaveTypeController extends Controller
{
    
    public function list()
    {
        $data['getRecord'] = LeaveType::getRecord();
              $data['header_title'] = 'Leave Type';

        return view('backend/leave_type/list',$data);
    }
    public function add()
    {
        $data['header_title'] = 'Add New Leave Type';
        return view('backend/leave_type/add',$data);
        
       
    }

    public function insert(Request $request)
    {
       // dd($request->all());
       $employee_status                 = new LeaveType;
       $employee_status->name           = trim($request->name);
       $employee_status->status      = trim($request->status);
       $employee_status->created_by =Auth::user()->id;
    
       $employee_status->save();
       return redirect('admin/leave/types')->with('success',' Leave Type Successfully Created');
       
    }
    public function edit($id)
    {
        $data['getRecord'] = LeaveType::getSingle($id);
        if(!empty($data['getRecord']))
        {
            
            $data['header_title'] = 'Edit Leave Type';
            return view('backend/leave_type/edit',$data); 
  
        }
        else
        {
        abort(404);
        }
       
        
       
    }

    public function update($id,Request $request)
    {
      // dd($request->all());
     
      $employee_status                 = LeaveType::getSingle($id);
      $employee_status->name           = trim($request->name);
      $employee_status->status      = trim($request->status);
      

      $employee_status->save();
      return redirect('admin/leave/types')->with('success','Leave Type Updated Successfully');
    }

    public function delete($id)
{
    $employee_status                 = LeaveType::getSingle($id);
    $employee_status->delete();
    
    return redirect()->back()->with('success','Leave Type Successfully Deleted');

}
}
