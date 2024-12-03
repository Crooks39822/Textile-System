<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;
    
    protected $table = 'assignments'; 
    static public function getRecord(){

        $return =self::select('assignments.*', 'classrooms.name as class_name', 'subjects.name as subject_name','subjects.subject_code as subject_code','users.name as created_by')
                        ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assignments.class_id')
                        ->join('users', 'users.id', '=', 'assignments.created_by');

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


                        $return = $return->where('assignments.is_delete','=',0)
                        ->orderBy('assignments.id','desc')
                        ->paginate(10);
                                return  $return;

    }
    static public function getRecordTeacher($class_ids){

        $return =self::select('assignments.*', 'classrooms.name as class_name', 'subjects.name as subject_name','subjects.subject_code as subject_code','users.name as created_by')
                        ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assignments.class_id')
                        ->join('users', 'users.id', '=', 'assignments.created_by')
                        ->whereIn('assignments.class_id',$class_ids);

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


                        $return = $return->where('assignments.is_delete','=',0)
                        ->orderBy('assignments.id','desc')
                        ->paginate(10);
                                return  $return;

    }
    static public function getRecordStudent($class_id,$student_id){

        $return =self::select('assignments.*', 'classrooms.name as class_name', 'subjects.name as subject_name','subjects.subject_code as subject_code','users.name as created_by')
                        ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assignments.class_id')
                        ->join('users', 'users.id', '=', 'assignments.created_by')
                        ->where('assignments.class_id','=',$class_id)
                        ->whereNotIn('assignments.id',function($query) use ($student_id){
                            $query->select('assignment_submits.assignment_id')
                            ->from('assignment_submits')
                            ->where('assignment_submits.student_id','=',$student_id);
                            
                            });

                       
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


                        $return = $return->where('assignments.is_delete','=',0)
                        ->orderBy('assignments.id','desc')
                        ->paginate(10);
                                return  $return;

    }



    

    static public function getRecordStudentCount($class_id,$student_id){

        $return =self::select('assignments.id')
                        ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assignments.class_id')
                        ->join('users', 'users.id', '=', 'assignments.created_by')
                        ->where('assignments.class_id','=',$class_id)
                        ->whereNotIn('assignments.id',function($query) use ($student_id){
                            $query->select('assignment_submits.assignment_id')
                            ->from('assignment_submits')
                            ->where('assignment_submits.student_id','=',$student_id);
                            
                            });

                        $return = $return->where('assignments.is_delete','=',0)
                             ->count();
                                return  $return;

    }

    static public function getSingle($id)
    {
        return self::find($id);
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
