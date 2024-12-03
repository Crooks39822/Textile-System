<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AssignClassTeacher extends Model
{
    use HasFactory;
    protected $table = 'assign_class_teachers';
    static public function getRecord(){

        $return =self::select('assign_class_teachers.*', 'classrooms.name as class_name', 'teacher.name as teacher_name',
         'teacher.last_name as teacher_last_name','users.name as created_by')
                        ->join('users as teacher', 'teacher.id', '=', 'assign_class_teachers.teacher_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assign_class_teachers.class_id')
                        ->join('users', 'users.id', '=', 'assign_class_teachers.created_by');


                        if(!empty(Request::get('class_name')))
                        {
                            $return = $return->where('classrooms.name','like', '%' .Request::get('class_name').'%');
                        }
                        if(!empty(Request::get('teacher_name')))
                        {
                            $return = $return->where('teacher.name','like', '%' .Request::get('teacher_name').'%');
                        }
                        

                        if(!empty(Request::get('date')))
                        {
                            $return = $return->whereDate('assign_class_teachers.created_at','=', (Request::get('date')));
                        }


                        $return = $return->where('assign_class_teachers.is_delete','=',0)
                        ->orderBy('assign_class_teachers.id','desc')
                        ->paginate(20);
                                return  $return;

    }
    static public function MyClassSubjectsCount($teacher_id)
    {
        return self::select('assign_class_teachers.id')
                        ->join('classrooms', 'classrooms.id', '=', 'assign_class_teachers.class_id')
                         ->join('subjects', 'subjects.id', '=', 'assign_class_teachers.subject_id')
                        ->where('assign_class_teachers.is_delete','=',0)
                        ->where('assign_class_teachers.status','=',0)
                        ->where('subjects.is_delete','=',0)
                        ->where('subjects.status','=',0)
                        ->where('classrooms.is_delete','=',0)
                        ->where('classrooms.status','=',0)
                        ->where('assign_class_teachers.teacher_id','=',$teacher_id)
                        ->count();
    }
    static public function MyClassSubjectsGroupCount($teacher_id)
    {
        return self::select('assign_class_teachers.id')
                        ->join('classrooms', 'classrooms.id', '=', 'assign_class_teachers.class_id')
                        ->join('subjects', 'subjects.id', '=', 'assign_class_teachers.subject_id')
                        ->where('assign_class_teachers.is_delete','=',0)
                        ->where('assign_class_teachers.status','=',0)
                        ->where('assign_class_teachers.teacher_id','=',$teacher_id)
                        
                        ->count();
    }
    static public function MyClassSubjects($teacher_id)
    {
        return self::select('assign_class_teachers.*', 'classrooms.name as class_name','subjects.name as subject_name',
        'subjects.type as subject_type','classrooms.id as class_id','subjects.id as subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assign_class_teachers.class_id')
                        ->join('class_subjects', 'class_subjects.class_id', '=', 'classrooms.id')
                        ->join('subjects', 'subjects.id', '=', 'assign_class_teachers.subject_id')
                        ->where('assign_class_teachers.is_delete','=',0)
                        ->where('assign_class_teachers.status','=',0)
                        ->where('subjects.is_delete','=',0)
                        ->where('subjects.status','=',0)
                        ->where('classrooms.is_delete','=',0)
                        ->where('classrooms.status','=',0)
                        ->where('class_subjects.is_delete','=',0)
                        ->where('class_subjects.status','=',0)
                        ->where('assign_class_teachers.teacher_id','=',$teacher_id)
                        ->groupBy('assign_class_teachers.id')
                        ->get();
    }
    static public function MyClassSubjectsGroup($teacher_id)
    {
        return self::select('assign_class_teachers.*', 'classrooms.name as class_name','classrooms.id as class_id')
                        ->join('classrooms', 'classrooms.id', '=', 'assign_class_teachers.class_id')
                         ->where('assign_class_teachers.is_delete','=',0)
                        ->where('assign_class_teachers.status','=',0)
                        ->where('assign_class_teachers.teacher_id','=',$teacher_id)
                        ->groupBy('assign_class_teachers.class_id')
                        ->get();
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getAlreadyFirst($class_id,$teacher_id)
    {
        return self::where('class_id','=',$class_id)->where('teacher_id','=',$teacher_id)->first();
    }
    static public function getAssignTeacherID($class_id)
    {
        return self::where('class_id','=',$class_id)->where('is_delete','=',0)->get();
    }
    static public function getAssignDeleteTeacher($class_id)
    {
        return self::where('class_id','=',$class_id)->delete();
    }
    static public function getMyTimeTable($class_id,$subject_id)
    {
        $getWeek = Week::getWeekUsingName(date('l'));
        return ClassSubjectTimetable::getRecordClassSubject($class_id,$subject_id,$getWeek->id);
    }
    static public function getCalendarTeacher($teacher_id)
    {
        return self::select('class_subject_timetables.*','classrooms.name as class_name','subjects.name as subject_name','weeks.name as week_name','weeks.fullcalendar_day')
                        ->join('classrooms','classrooms.id','=','assign_class_teachers.class_id' )
                        ->join('class_subjects','class_subjects.class_id','=','classrooms.id' )
                        ->join('class_subject_timetables','class_subject_timetables.subject_id','=','assign_class_teachers.subject_id' )
                        ->join('subjects','subjects.id','=','class_subject_timetables.subject_id' )
                        ->join('weeks','weeks.id','=','class_subject_timetables.week_id' )
                        ->where('assign_class_teachers.teacher_id','=',$teacher_id)
                        ->where('assign_class_teachers.is_delete','=',0)
                        ->where('assign_class_teachers.status','=',0)
                        ->groupBy('class_subject_timetables.id')
                        ->get();
    }
}
