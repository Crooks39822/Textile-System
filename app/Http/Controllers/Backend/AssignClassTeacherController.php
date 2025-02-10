<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use App\Models\AssignClassTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AssignClassTeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = AssignClassTeacher::getRecord();
        $data['header_title'] = 'Assign Supervisor to Department';
        return view('backend/assign_line_to_supervisor/list',$data);

    }

    public function add()
    {
        $data['getClass'] = Classroom::getClass();
        $data['getSubject'] = Subject::getSubject();

        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = 'Supervisor to Department Assign Add';
        return view('backend/assign_line_to_supervisor/add',$data);


    }

    public function insert(Request $request)
    {
        AssignClassTeacher::where('class_id','=',$request->class_id)->where('teacher_id','=',$request->teacher_id)->delete();
        if(!empty($request->teacher_id))
        {

        foreach($request->teacher_id as $teacher_id)
        {
            //dd($request->all());
            $getAlreadyFirst = AssignClassTeacher::getAlreadyFirst($request->class_id,$teacher_id);
            if(!empty($getAlreadyFirst))
            {
                $getAlreadyFirst->status  = $request->status;
                $getAlreadyFirst->save();
            }
            else
            {
                $save                     = new AssignClassTeacher;
                $save->class_id           = $request->class_id;
                $save->teacher_id         = $teacher_id;
                $save->status             = $request->status;
                $save->created_by         = Auth::user()->id;
                $save->save();

            }

        }
        return redirect('admin/assign_line_to_supervisor')->with('success',' Supervisor to Department Assigned Successfully Created');
        }
        else
        {

            return redirect()->back()->with('error','Due to some errors, Please try again');
        }




    }
    public function get_subject(Request $request)
    {

        $getSubject = ClassSubject::mySubjects($request->class_id);

        $html = "<option value=''> Select </option>";

        foreach($getSubject as $value)
        {
        $html .= "<option value='".$value->subject_id."'>".$value->subject_name."</option>";
        }

        $json['html'] = $html;
        echo json_encode($json);
    }
    public function edit($id)
    {
        $getRecord = AssignClassTeacher::getSingle($id);
       // $getSubject = ClassSubject::mySubjects($getRecord->class_id);

        if(!empty('getRecord'))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacher::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = Classroom::getClass();
            $data['getTeacher'] = User::getTeacherClass();
           
            $data['header_title'] = 'Edit  Assign Supervisor to Department';
            return view('backend/assign_line_to_supervisor/edit',$data);

        }
        else
        {
        abort(404);
        }

    }

       public function update(Request $request)
       {
        AssignClassTeacher::getAssignDeleteTeacher($request->class_id);
        if(!empty($request->teacher_id))
        {

        foreach($request->teacher_id as $teacher_id)
        {
            //dd($request->all());
            $getAlreadyFirst = AssignClassTeacher::getAlreadyFirst($request->class_id,$teacher_id);
            if(!empty($getAlreadyFirst))
            {
                $getAlreadyFirst->status  = $request->status;
                $getAlreadyFirst->save();
            }
            else
            {
                $save                     = new AssignClassTeacher;
                $save->class_id           = $request->class_id;
                $save->teacher_id         = $teacher_id;
                $save->status             = $request->status;
                $save->created_by         = Auth::user()->id;
                $save->save();

            }

            }

        }


        return redirect('admin/assign_line_to_supervisor')->with('success','Supervisor to Department Assigned Successfully Created');

       }

       public function single_edit($id)
       {
        $getRecord = AssignClassTeacher::getSingle($id);

        if(!empty('getRecord'))
        {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = Classroom::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = 'Edit  Assign Supervisor to Department';
            return view('backend/assign_line_to_supervisor/single_edit',$data);

        }
        else
        {
        abort(404);
        }

       }

       public function update_single($id, Request $request)
    {


          //dd($request->all());
            $getAlreadyFirst = AssignClassTeacher::getAlreadyFirst($request->class_id,$request->teacher_id,$request->subject_id);
            if(!empty($getAlreadyFirst))
            {
                $getAlreadyFirst->status  = $request->status;
                $getAlreadyFirst->save();
                return redirect('admin/assign_line_to_supervisor')->with('success','Status Successfully Updated');
            }
            else
            {
                $save                     = AssignClassTeacher::getSingle($id);
                $save->class_id           = $request->class_id;
                $save->teacher_id         = $request->teacher_id;
                $save->status             = $request->status;
                $save->save();


                return redirect('admin/assign_line_to_supervisor')->with('success','Supervisor to Department Assigned Successfully Updated');


        }


    }

    public function delete($id)
    {
        $save  = AssignClassTeacher::getSingle($id);

        $save->delete();


        return redirect()->back()->with('success','Supervisor to Department Assigned  Successfully Deleted');


    }

//teacher sider work
    public function MyClassSubjects()
    {
        $data['getRecord'] = AssignClassTeacher::MyClassSubjects(Auth::user()->id);
        $data['header_title'] = 'My Class & Subject';
        return view('backend/teacher/my_class_subjects',$data);

    }
}
