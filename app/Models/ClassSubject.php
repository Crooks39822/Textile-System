<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class ClassSubject extends Model
{
    use HasFactory;
    protected $table = 'class_subjects';
    static public function getRecord(){

        $return =self::select('class_subjects.*', 'classrooms.name as class_name', 'subjects.name as subject_name','users.name as created_by',
        'employee.name as employee_name','employee.last_name as last_name','employee.admission_number as admission_number')
                        ->join('subjects', 'subjects.id', '=', 'class_subjects.subject_id')
                        ->join('users as employee','employee.id','=','class_subjects.class_id','left')
                        ->join('classrooms', 'classrooms.id', '=', 'employee.class_id')
                        ->join('users', 'users.id', '=', 'class_subjects.created_by');
                        

                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('employee.name','like', '%' .Request::get('name').'%');
                        }
                        if(!empty(Request::get('subject_name')))
                        {
                            $return = $return->where('subjects.id','=',Request::get('subject_name'));
                        }


                        if(!empty(Request::get('date')))
                        {
                            $return = $return->whereDate('class_subjects.created_at','=', (Request::get('date')));
                        }

                        $return = $return->where('class_subjects.is_delete','=',0)
                        ->orderBy('class_subjects.id','desc')
                        ->paginate(100);
                                return  $return;

    }

    static public function getAlreadyFirst($class_id,$subjects_id)
    {
        return self::where('class_id','=',$class_id)->where('subject_id','=',$subjects_id)->first();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getAssignSubjectID($class_id)
    {
        return self::where('class_id','=',$class_id)->where('is_delete','=',0)->get();
    }
    static public function getAssignDelete($class_id)
    {
        return self::where('class_id','=',$class_id)->delete();
    }


    static public function mySubjects($class_id)
    {
        return self::select('class_subjects.*', 'subjects.name as subject_name')
        ->join('subjects', 'subjects.id', '=', 'class_subjects.subject_id')
        ->join('classrooms', 'classrooms.id', '=', 'class_subjects.class_id')
        ->join('users', 'users.id', '=', 'class_subjects.created_by')
        ->where('class_subjects.class_id','=',$class_id)
        ->where('class_subjects.is_delete','=',0)
        ->where('class_subjects.status','=',0)
        ->orderBy('class_subjects.id','desc')
        ->get();

    }

    
    static public function mySubjectsTotal($class_id)
    {
        return self::select('class_subjects.*', 'subjects.name as subject_name')
        ->join('subjects', 'subjects.id', '=', 'class_subjects.subject_id')
        ->join('classrooms', 'classrooms.id', '=', 'class_subjects.class_id')
        ->join('users', 'users.id', '=', 'class_subjects.created_by')
        ->where('class_subjects.class_id','=',$class_id)
        ->where('class_subjects.is_delete','=',0)
        ->where('class_subjects.status','=',0)
        ->orderBy('class_subjects.id','desc')
        ->count();

    }

}
