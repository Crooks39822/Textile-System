<?php

namespace App\Http\Controllers\Backend;

use App\Models\LeaveType;
use App\Models\ActionType;
use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    
    public function list()
    {
        $data['getRecord'] = ActionType::getRecord();
              $data['header_title'] = 'Action Type';

        return view('backend/actions/list',$data);
    }
    public function add()
    {
        $data['header_title'] = 'Add New Action Type';
        return view('backend/actions/add',$data);
        
       
    }

    public function insert(Request $request)
    {
       // dd($request->all());
       $employee_status                 = new ActionType;
       $employee_status->name           = trim($request->name);
       $employee_status->status      = trim($request->status);
       $employee_status->created_by =Auth::user()->id;
    
       $employee_status->save();
       return redirect('admin/employees/disciplinary/action')->with('success',' Action Type Successfully Created');
       
    }
    public function edit($id)
    {
        $data['getRecord'] = ActionType::getSingle($id);
        if(!empty($data['getRecord']))
        {
            
            $data['header_title'] = 'Edit Action Type';
            return view('backend/actions/edit',$data); 
  
        }
        else
        {
        abort(404);
        }
       
        
       
    }

    public function update($id,Request $request)
    {
      // dd($request->all());
     
      $employee_status                 = ActionType::getSingle($id);
      $employee_status->name           = trim($request->name);
      $employee_status->status      = trim($request->status);
      

      $employee_status->save();
      return redirect('admin/employees/disciplinary/action')->with('success','Action Type Updated Successfully');
    }

    public function delete($id)
{
    $employee_status                 = ActionType::getSingle($id);
    $employee_status->delete();
    
    return redirect()->back()->with('success','Action Type Successfully Deleted');

}
}
