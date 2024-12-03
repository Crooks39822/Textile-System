<?php

namespace App\Http\Controllers\Backend;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminPositionController extends Controller
{
    
    public function list()
    {
        $data['getRecord'] = AcademicYear::getRecord();
              $data['header_title'] = 'Admin Position';

        return view('backend/admin_position/list',$data);
    }
    public function add()
    {
        $data['header_title'] = 'Add New Admin Position';
        return view('backend/admin_position/add',$data);
        
       
    }

    public function insert(Request $request)
    {
       // dd($request->all());
       $admin_position                 = new AcademicYear;
       $admin_position->name           = trim($request->name);
       $admin_position->status      = trim($request->status);
       $admin_position->created_by =Auth::user()->id;
    
       $admin_position->save();
       return redirect('admin/admin_positions')->with('success',' Admin Position Successfully Created');
       
    }
    public function edit($id)
    {
        $data['getRecord'] = AcademicYear::getSingle($id);
        if(!empty($data['getRecord']))
        {
            
            $data['header_title'] = 'Edit Admin Position';
            return view('backend/admin_position/edit',$data); 
  
        }
        else
        {
        abort(404);
        }
       
        
       
    }

    public function update($id,Request $request)
    {
      // dd($request->all());
     
      $admin_position                 = AcademicYear::getSingle($id);
      $admin_position->name           = trim($request->name);
      $admin_position->status      = trim($request->status);
      

      $admin_position->save();
      return redirect('admin/admin_positions')->with('success','Admin Position Added Successfully');
    }

    public function delete($id)
{
    $admin_position                 = AcademicYear::getSingle($id);
    $admin_position->delete();
    
    return redirect()->back()->with('success','Admin Position Successfully Deleted');

}
}
