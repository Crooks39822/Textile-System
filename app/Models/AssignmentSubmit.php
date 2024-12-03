<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignmentSubmit extends Model
{
    use HasFactory;
    protected $table = 'assignment_submits';
    static public function getAssignmentReport()
    {
        $return =self::select('assignment_submits.*', 'classrooms.name as class_name', 
        'subjects.name as subject_name','subjects.subject_code as subject_code',
        'users.name as first_name','users.last_name as last_name')
        ->join('users', 'users.id', '=', 'assignment_submits.student_id')
        ->join('assignments', 'assignments.id', '=', 'assignment_submits.assignment_id')
        ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
        ->join('classrooms', 'classrooms.id', '=', 'assignments.class_id');

        if(!empty(Request::get('last_name')))
        {
            $return = $return->where('users.last_name','like', '%' .Request::get('last_name').'%');
        }
        
        if(!empty(Request::get('student_name')))
        {
            $return = $return->where('users.name','like', '%' .Request::get('student_name').'%');
        }
        if(!empty(Request::get('class_name')))
        {
            $return = $return->where('classrooms.name','like', '%' .Request::get('class_name').'%');
        }
        if(!empty(Request::get('subject_name')))
        {
            $return = $return->where('subjects.name','like', '%' .Request::get('subject_name').'%');
        }

        if(!empty(Request::get('from_assignment_date')))
        {
            $return = $return->where('assignments.assignment_date','>=', (Request::get('from_assignment_date')));
        }
        if(!empty(Request::get('to_assignment_date')))
        {
            $return = $return->where('assignments.assignment_date','<=', (Request::get('to_assignment_date')));
        }

        if(!empty(Request::get('submitted_from_assignment_date')))
        {
            $return = $return->where('assignment_submits.created_at','>=', (Request::get('submitted_from_assignment_date')));
        }
        if(!empty(Request::get('submitted_to_assignment_date')))
        {
            $return = $return->where('assignment_submits.created_at','<=', (Request::get('submitted_to_assignment_date')));
        }

        
        $return = $return->orderBy('assignment_submits.id','desc')
        ->paginate(10);
                return  $return;  
    }
    static public function getRecord($assignment_id)
    {
        $return =self::select('assignment_submits.*','users.name as first_name','users.last_name')
                    ->join('users', 'users.id', '=', 'assignment_submits.student_id')
                    ->where('assignment_submits.assignment_id','=',$assignment_id);

        if(!empty(Request::get('student_name')))
        {
            $return = $return->where('users.name','like', '%' .Request::get('student_name').'%');
        }
        if(!empty(Request::get('last_name')))
        {
            $return = $return->where('users.last_name','like', '%' .Request::get('last_name').'%');
        }
       
       
        if(!empty(Request::get('submitted_from_assignment_date')))
        {
            $return = $return->where('assignment_submits.created_at','>=', (Request::get('submitted_from_assignment_date')));
        }
        if(!empty(Request::get('submitted_to_assignment_date')))
        {
            $return = $return->where('assignment_submits.created_at','<=', (Request::get('submitted_to_assignment_date')));
        }

        
        $return = $return->orderBy('assignment_submits.id','desc')
                        ->paginate(50);
     return  $return;

    }
    static public function getRecordStudent($student_id){

        $return =self::select('assignment_submits.*', 'classrooms.name as class_name', 'subjects.name as subject_name','subjects.subject_code as subject_code','users.name as created_by')
                        ->join('assignments', 'assignments.id', '=', 'assignment_submits.assignment_id')
                        ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assignments.class_id')
                        ->join('users', 'users.id', '=', 'assignments.created_by')
                        ->where('assignment_submits.student_id', '=',$student_id);

                        if(!empty(Request::get('class_name')))
                        {
                            $return = $return->where('classrooms.name','like', '%' .Request::get('class_name').'%');
                        }
                        if(!empty(Request::get('subject_name')))
                        {
                            $return = $return->where('subjects.name','like', '%' .Request::get('subject_name').'%');
                        }

                        if(!empty(Request::get('from_assignment_date')))
                        {
                            $return = $return->where('assignments.assignment_date','>=', (Request::get('from_assignment_date')));
                        }
                        if(!empty(Request::get('to_assignment_date')))
                        {
                            $return = $return->where('assignments.assignment_date','<=', (Request::get('to_assignment_date')));
                        }

                        if(!empty(Request::get('submitted_from_assignment_date')))
                        {
                            $return = $return->where('assignment_submits.created_at','>=', (Request::get('submitted_from_assignment_date')));
                        }
                        if(!empty(Request::get('submitted_to_assignment_date')))
                        {
                            $return = $return->where('assignment_submits.created_at','<=', (Request::get('submitted_to_assignment_date')));
                        }

                        
                        $return = $return->orderBy('assignment_submits.id','desc')
                        ->paginate(10);
                                return  $return;

    }
    
    
    static public function getRecordStudentCount($student_id){

        $return =self::select('assignment_submits.id')
                        ->join('assignments', 'assignments.id', '=', 'assignment_submits.assignment_id')
                        ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assignments.class_id')
                        ->join('users', 'users.id', '=', 'assignments.created_by')
                        ->where('assignment_submits.student_id', '=',$student_id);
                        $return = $return->count();
                                return  $return;

    }
    static public function getRecordStudentCountParent($student_ids){

        $return =self::select('assignment_submits.id')
                        ->join('assignments', 'assignments.id', '=', 'assignment_submits.assignment_id')
                        ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assignments.class_id')
                        ->join('users', 'users.id', '=', 'assignments.created_by')
                        ->whereIn('assignment_submits.student_id', $student_ids);
                        $return = $return->count();
                                return  $return;

    }




    
    public function getAssignment()
    {
    return $this->belongsTo(Assignment::class,"assignment_id");
    }

    public function getStudent()
    {
    return $this->belongsTo(User::class,"student_id");
    }
    public function getDocument()
    {
        if(!empty($this->document_file) && file_exists('upload/documents/'.$this->document_file))
        {
            return url('upload/documents/'.$this->document_file);
        }
        else
        {
            return "";
        }
    }
}
