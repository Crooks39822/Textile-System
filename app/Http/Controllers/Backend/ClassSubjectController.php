<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\ClassSubject;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClassSubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassSubject::getRecord();
        $data['getMachine'] = Subject::getRecord();
        $data['header_title'] = 'Matrix Assign List';
        return view('backend/assign_machine/list',$data);
       
    }
    public function assign_subject_add()
    {
        $data['getEmployee'] = User::getStudent12();
        $data['getSubject'] = Subject::getSubject();
        $data['header_title'] = 'Matrix Assign Add';
        return view('backend/assign_machine/add',$data);
        
       
    }
    
    public function register_assign_subject(Request $request)
    {
        if(!empty($request->subjects_id))
        {
            
        foreach($request->subjects_id as $subjects_id)
        {
            //dd($request->all()); 
            $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id,$subjects_id);
            if(!empty($getAlreadyFirst))
            {
                $getAlreadyFirst->status  = $request->status;
                $getAlreadyFirst->save();
            }
            else
            {
                $save                     = new ClassSubject;
                $save->class_id           = $request->class_id; 
                $save->subject_id         = $subjects_id; 
                $save->status             = $request->status; 
                $save->created_by         = Auth::user()->id;
                $save->save();

            }
            
            
             
           
            
            
        }
        return redirect('admin/assign_machine')->with('success','Machine Assigned to Employee Successfully Created');
        }
        else
        {
            
            return redirect()->back()->with('error','Due to some errors, Please try again');
        }
        
       
        
       
    }

    public function assign_subject_edit($id)
    {
        $getRecord = ClassSubject::getSingle($id);
       
        if(!empty('getRecord'))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubject::getAssignSubjectID($getRecord->class_id);
            $data['getEmployee'] = User::getStudent12($id);
            $data['getSubject'] = Subject::getSubject();
            $data['getRecord'] = ClassSubject::getSingle($id);
            $data['header_title'] = 'Edit  Assign Machine to Employee';
            return view('backend/assign_machine/edit',$data); 
  
        }
        else
        {
        abort(404);
        }
       
    }
    public function assign_subject_update(Request $request)
{
	ClassSubject::getAssignDelete($request->class_id);
    if(!empty($request->subjects_id))
    {
        
    foreach($request->subjects_id as $subjects_id)
    {
        //dd($request->all()); 
        $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id,$subjects_id);
        if(!empty($getAlreadyFirst))
        {
            $getAlreadyFirst->status  = $request->status;
            $getAlreadyFirst->save();
        }
        else
        {
            $save                     = new ClassSubject;
            $save->class_id           = $request->class_id; 
            $save->subject_id         = $subjects_id; 
            $save->status             = $request->status; 
            $save->created_by         = Auth::user()->id;
            $save->save();

        }
        
    }
    
    }
    return redirect('admin/assign_machine')->with('success','Machine Assigned to Employee Successfully Created');
}
    public function assign_subject_delete($id)
    {
      $save      = ClassSubject::getSingle($id);
      $save->is_delete = 1;
      $save->save();
      return redirect('/admin/assign_machine')->with('success','Matrix Deleted Successfully');
    }

    public function update_single_edit($id)
    {
        $getRecord = ClassSubject::getSingle($id);
       
        if(!empty('getRecord'))
        {
            $data['getRecord'] = $getRecord;
            $data['getEmployee'] = User::getStudent12($id);
            $data['getSubject'] = Subject::getSubject();
            $data['getRecord'] = ClassSubject::getSingle($id);
            $data['header_title'] = 'Edit  Matrix';
            return view('backend/assign_machine/edit_single',$data); 
  
        }
        else
        {
        abort(404);
        }

    }

    public function update_single($id, Request $request)
    {
        
            
          //dd($request->all()); 
            $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id,$request->subjects_id);
            if(!empty($getAlreadyFirst))
            {
                $getAlreadyFirst->status  = $request->status;
                $getAlreadyFirst->save();
                return redirect('admin/assign_machine')->with('success','Status Successfully Updated');
            }
            else
            {
                $save                     = ClassSubject::getSingle($id);
                $save->class_id           = $request->class_id; 
                $save->subject_id         = $request->subjects_id; 
                $save->status             = $request->status; 
                $save->save();
    
            
                return redirect('admin/assign_machine')->with('success','Machine Assigned to Employee Successfully Updated');
        
        
        }
        

    }
}
