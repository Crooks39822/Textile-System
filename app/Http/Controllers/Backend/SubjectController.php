<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ClassSubject;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Subject::getRecord();
        $data['header_title'] = 'Machine List';
        return view('backend/machine/list',$data);

    }
    public function subject_add()
    {
        $data['header_title'] = 'Add New Machine';
        return view('backend/machine/add',$data);


    }
    public function subject_edit($id)
    {
        $data['getRecord'] = Subject::getSingle($id);
        if(!empty($data['getRecord']))
        {

            $data['header_title'] = 'Edit  Machine';
            return view('backend/machine/edit',$data);

        }
        else
        {
        abort(404);
        }



    }
    public function register_subject(Request $request)
    {
       // dd($request->all());
       $machine                 = new Subject;
       $machine->name           = trim($request->name);
       $machine->status      = trim($request->status);
       $machine->created_by =Auth::user()->id;
       $machine->save();
       return redirect('admin/machine')->with('success','Machine Successfully Created');



    }
    public function subject_update($id,Request $request)
    {
      // dd($request->all());

      $machine                 = Subject::getSingle($id);
      $machine->name           = trim($request->name);
      $machine->status      = trim($request->status);
      $machine->save();

      return redirect('/admin/machine')->with('success','Machine Updated Successfully');
    }
    public function subject_delete($id)
    {
      $machine                 = Subject::getSingle($id);
      $machine->is_delete        = 1;
      $machine->save();
      return redirect('/admin/machine')->with('success','Machine Deleted Successfully');
    }

    //student side
public function mySubjects()
{
    $data['getRecord'] = ClassSubject::mySubjects(Auth::user()->class_id);
    $data['header_title'] = 'My Subjects';
    return view('backend/student/my_subjects',$data);

}

public function ParentStudentSubject($student_id)
{
$user = User::getSingle($student_id);
$data['getUser']=$user;
$data['getRecord'] = ClassSubject::mySubjects($user->class_id);

    $data['header_title'] = 'Student Subjects';
    return view('backend/parent/my_student_subjects',$data);
}

}
