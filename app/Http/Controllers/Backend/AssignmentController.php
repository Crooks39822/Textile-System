<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Assignment;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use App\Models\AssignmentSubmit;
use App\Models\AssignClassTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
   public function assignment_reports()
   {
    $data['getRecord'] = AssignmentSubmit::getAssignmentReport();
        $data['header_title'] = 'Assignment Report';
        return view('backend/assignment/report',$data);
   } 
    public function list()
    {
        $data['getRecord'] = Assignment::getRecord();
        $data['header_title'] = 'Assignment List';
        return view('backend/assignment/list',$data);
    }
    
    
    
    public function add()
    {
        $data['getClass'] = Classroom::getClass();
        $data['getSubject'] = Subject::getSubject();
        $data['header_title'] = 'Add Assignment';
        return view('backend/assignment/add',$data);
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

   
    public function insert(Request $request)
    {
        //dd($request->all());
        $assignment = new Assignment;
        $assignment->class_id =$request->class_id;
        $assignment->subject_id =$request->subject_id;
        if(!empty($request->assignment_date))
        {
          $assignment->assignment_date  =trim($request->assignment_date);
        }
        if(!empty($request->submission_date))
        {
          $assignment->submission_date  =trim($request->submission_date);
        }
        $assignment->description =$request->description;
        if(!empty($request->file('document_file')))
        {
          
          $ext =$request->file('document_file')->getClientoriginalExtension();
          $file =$request->file('document_file');
          $randomStr = date('Ymdhis');
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/documents/',$filename);
          $assignment->document_file  =$filename;
        }
        
        $assignment->created_by =Auth::user()->id;
        $assignment->save();
        return redirect('admin/assignment/assignment')->with('success','Assignment Successfully Added');
    }

   
    public function edit(string $id)
    {
        $getRecord         = Assignment::getSingle($id);
        $data['getRecord'] = $getRecord;
        $data['getClass'] = Classroom::getClass();
        $data['getSubject'] = ClassSubject::mySubjects($getRecord->class_id);
        $data['header_title'] = 'Edit  Assignment';
        return view('backend/assignment/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assignment = Assignment::getSingle($id);
        $assignment->class_id =$request->class_id;
        $assignment->subject_id =$request->subject_id;
        if(!empty($request->assignment_date))
        {
          $assignment->assignment_date  =trim($request->assignment_date);
        }
        if(!empty($request->submission_date))
        {
          $assignment->submission_date  =trim($request->submission_date);
        }
        $assignment->description =$request->description;
        if(!empty($request->file('document_file')))
        {
            if(!empty($assignment->getDocument()))
          {
            unlink('upload/documents/'.$assignment->document_file);

          }
          
          $ext =$request->file('document_file')->getClientoriginalExtension();
          $file =$request->file('document_file');
          $randomStr = date('Ymdhis');
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/documents/',$filename);
          $assignment->document_file  =$filename;
        }
        
       
        $assignment->save();
        return redirect('admin/assignment/assignment')->with('success','Assignment Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $getRecord = Assignment::getSingle($id);
        if(!empty($getRecord))
        {
          $getRecord->is_delete = 1;
          $getRecord->save();
          return redirect()->back()->with('success','Assignment Successfully Deleted');
        }else
        {
          abort(404);
        }
    }
    //teacher
    public function AssignmentList()
    {
      $class_ids = array();
      $getClass = AssignClassTeacher::MyClassSubjectsGroup(Auth::user()->id);
      foreach($getClass as $class)
      {
      $class_ids[] = $class->class_id;
      }
        $data['getRecord'] = Assignment::getRecordTeacher($class_ids);
        $data['header_title'] = 'Assignment List';
        return view('backend/teacher/assignment/list',$data);
    }
    public function AssignmentAdd()
    {
      
        $data['getClass'] = AssignClassTeacher::MyClassSubjectsGroup(Auth::user()->id);
        $data['getSubject'] = Subject::getSubject();
        $data['header_title'] = 'Add Assignment';
        return view('backend/teacher/assignment/add',$data);
    }

    public function AssignmentInsert(Request $request)
    {
        //dd($request->all());
        $assignment = new Assignment;
        $assignment->class_id =$request->class_id;
        $assignment->subject_id =$request->subject_id;
        if(!empty($request->assignment_date))
        {
          $assignment->assignment_date  =trim($request->assignment_date);
        }
        if(!empty($request->submission_date))
        {
          $assignment->submission_date  =trim($request->submission_date);
        }
        $assignment->description =$request->description;
        if(!empty($request->file('document_file')))
        {
          
          $ext =$request->file('document_file')->getClientoriginalExtension();
          $file =$request->file('document_file');
          $randomStr = date('Ymdhis');
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/documents/',$filename);
          $assignment->document_file  =$filename;
        }
        
        $assignment->created_by =Auth::user()->id;
        $assignment->save();
        return redirect('teacher/assignment')->with('success','Assignment Successfully Added');
    }
    public function AssignmentEdit(string $id)
    {
        $getRecord         = Assignment::getSingle($id);
        $data['getRecord'] = $getRecord;
        $data['getClass'] = AssignClassTeacher::MyClassSubjectsGroup(Auth::user()->id);
        $data['getSubject'] = ClassSubject::mySubjects($getRecord->class_id);
        $data['header_title'] = 'Edit  Assignment';
        return view('backend/teacher/assignment/edit',$data);
    }
    public function AssignmentUpdate(Request $request, string $id)
    {
        $assignment = Assignment::getSingle($id);
        $assignment->class_id =$request->class_id;
        $assignment->subject_id =$request->subject_id;
        if(!empty($request->assignment_date))
        {
          $assignment->assignment_date  =trim($request->assignment_date);
        }
        if(!empty($request->submission_date))
        {
          $assignment->submission_date  =trim($request->submission_date);
        }
        $assignment->description =$request->description;
        if(!empty($request->file('document_file')))
        {
            if(!empty($assignment->getDocument()))
          {
            unlink('upload/documents/'.$assignment->document_file);

          }
          
          $ext =$request->file('document_file')->getClientoriginalExtension();
          $file =$request->file('document_file');
          $randomStr = date('Ymdhis');
          $filename =strtolower($randomStr).'.'.$ext;
          $file->move('upload/documents/',$filename);
          $assignment->document_file  =$filename;
        }
        
       
        $assignment->save();
        return redirect('teacher/assignment')->with('success','Assignment Successfully Updated');
    }
    //student side

    public function MyAssignment()
    {
      $data['getRecord'] = Assignment::getRecordStudent(Auth::user()->class_id,Auth::user()->id);
      $data['header_title'] = 'My Assignment List';
      return view('backend/student/assignment/my_assignment',$data);

    }
    public function MyAssignmentSubmit($assignment_id)
    {
      $data['getRecord'] = Assignment::getSingle($assignment_id);
      $data['header_title'] = 'Sumit My Assignment';
      return view('backend/student/assignment/submit',$data);

    }
    public function submitted($assignment_id)
    {
      $assignment = Assignment::getSingle($assignment_id);
      if (!empty($assignment)) {
        $data['assignment_id']= $assignment_id;
        $data['getRecord'] = AssignmentSubmit::getRecord($assignment_id);
        $data['header_title'] = 'Submitted Assignment';
        return view('backend/assignment/submitted',$data);
      }
      else {
        abort(404);
      }
    }
    public function Teachersubmitted($assignment_id)
    {
      $assignment = Assignment::getSingle($assignment_id);
      if (!empty($assignment)) {
        $data['assignment_id']= $assignment_id;
        $data['getRecord'] = AssignmentSubmit::getRecord($assignment_id);
        $data['header_title'] = 'Submitted Assignment';
        return view('backend/teacher/assignment/submitted',$data);
      }
      else {
        abort(404);
      }
    }

    
      public function MyAssignmentSubmitInsert($assignment_id, Request $request)
      {

            $assignment = new AssignmentSubmit;
            $assignment->assignment_id = $assignment_id;
            $assignment->student_id = Auth::user()->id;
            $assignment->description =trim($request->description);
            if(!empty($request->file('document_file')))
              {
                          
                $ext =$request->file('document_file')->getClientoriginalExtension();
                $file =$request->file('document_file');
                $randomStr = date('Ymdhis');
                $filename =strtolower($randomStr).'.'.$ext;
                $file->move('upload/documents/',$filename);
                $assignment->document_file  =$filename;
              }
              
            
              $assignment->save();
              return redirect('student/my_assignments')->with('success','Assignment Successfully Submited');
      }
    public function MySubmittedAssignment(Request $request)
    {
      $data['getRecord'] = AssignmentSubmit::getRecordStudent(Auth::user()->id);
      $data['header_title'] = 'My Submitted Assignment List';
      return view('backend/student/assignment/my_submitted_assignment',$data);
    }

    //parent side
    
    public function MyAssignmentParent($student_id)
    {
      $getStudent = User::getSingle($student_id);
      $data['getRecord'] = Assignment::getRecordStudent($getStudent->class_id,$getStudent->id);
      $data['getStudent'] = $getStudent; 
      $data['header_title'] = 'My Student Assignment ';
      return view('backend/parent/assignment/my_student_assignment',$data);

    }
    public function SubmittedAssignmentParent($student_id)
    {
      $getStudent = User::getSingle($student_id);
      $data['getRecord'] = AssignmentSubmit::getRecordStudent($getStudent->id);
      $data['getStudent'] = $getStudent; 
      $data['header_title'] = 'Student Submitted Assignment List';
      return view('backend/parent/assignment/my_submitted_assignment',$data);
    }
    
    
}
