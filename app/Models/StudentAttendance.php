<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentAttendance extends Model
{
    use HasFactory;
    protected $table = 'student_attendances';
    static public function CheckAlreadyAttendance($student_id,$attendance_date,$class_id)
    {

        return self::where('student_id','=',$student_id)->where('attendance_date','=',$attendance_date)
                                                        ->where('class_id','=',$class_id)->first();

    }
    static public function getRecord(){

        $return =self::select('student_attendances.*', 'classrooms.name as class_name','student.name as student_name'
        ,'student.last_name as student_last_name','student.admission_number as admission_number','createdBy.name as created_by_name')
                         ->join('classrooms', 'classrooms.id', '=', 'student_attendances.class_id')
                         ->join('users as student', 'student.id', '=', 'student_attendances.student_id')
                         ->join('users as createdBy', 'createdBy.id', '=', 'student_attendances.created_by');

                        if(!empty(Request::get('class_name')))
                        {
                            $return = $return->where('classrooms.id','=',Request::get('class_name'));
                        }
                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('student.name','like', '%' .Request::get('name').'%');

                        }

                        if(!empty(Request::get('start_attendance_date')))
                        {
                            $return = $return->where('student_attendances.attendance_date','>=', (Request::get('start_attendance_date')));
                        }
                        if(!empty(Request::get('end_attendance_date')))
                        {
                            $return = $return->where('student_attendances.attendance_date','<=', (Request::get('end_attendance_date')));
                        }
                        if(!empty(Request::get('attendance_type')))
                        {
                            $return = $return->where('student_attendances.attendance_type','=', (Request::get('attendance_type')));
                        }
                        if(!empty(Request::get('admission_number')))
                        {

                            $return = $return->where('student.admission_number','=',Request::get('admission_number'));
                        }

        $return = $return->orderBy('student_attendances.id','desc')
                         ->paginate(50);
         return  $return;

    }
    static public function getRecordTeacher($class_ids){

        if(!empty($class_ids))
        {
            $return =self::select('student_attendances.*', 'classrooms.name as class_name','student.name as student_name'
            ,'student.last_name as student_last_name','student.id_number as id_number','createdBy.name as created_by_name')
                             ->join('classrooms', 'classrooms.id', '=', 'student_attendances.class_id')
                             ->join('users as student', 'student.id', '=', 'student_attendances.student_id')
                             ->join('users as createdBy', 'createdBy.id', '=', 'student_attendances.created_by')
                             ->whereIn('student_attendances.class_id',$class_ids);

                            if(!empty(Request::get('class_name')))
                            {
                                $return = $return->where('classrooms.name','like', '%' .Request::get('class_name').'%');
                            }
                            if(!empty(Request::get('name')))
                            {
                                $return = $return->where('student.name','like', '%' .Request::get('name').'%');

                            }

                            if(!empty(Request::get('start_attendance_date')))
                            {
                                $return = $return->where('student_attendances.attendance_date','>=', (Request::get('start_attendance_date')));
                            }
                            if(!empty(Request::get('end_attendance_date')))
                            {
                                $return = $return->where('student_attendances.attendance_date','<=', (Request::get('end_attendance_date')));
                            }
                            if(!empty(Request::get('attendance_type')))
                            {
                                $return = $return->where('student_attendances.attendance_type','=', (Request::get('attendance_type')));
                            }
                            if(!empty(Request::get('id_number')))
                            {

                                $return = $return->where('student.admission_number','like', '%' .Request::get('admission_number').'%');
                            }

            $return = $return->orderBy('student_attendances.id','desc')
                             ->paginate(50);
             return  $return;

        }
        else
        {

            return  '';
        }



    }
    
    static public function getRecordStudentCount($student_id)
    {
        $return =self::select('student_attendances.id')
                         ->join('classrooms', 'classrooms.id', '=', 'student_attendances.class_id')
                         ->where('student_attendances.student_id','=',$student_id);

                                $return = $return ->count();
                        
         return  $return;

    }
    static public function getRecordStudentCountParent($student_ids)
    {
        $return =self::select('student_attendances.id')
                         ->join('classrooms', 'classrooms.id', '=', 'student_attendances.class_id')
                         ->whereIn('student_attendances.student_id',$student_ids);

                                $return = $return ->count();
                        
         return  $return;

    }
    static public function getRecordStudent($student_id)
    {
        $return =self::select('student_attendances.*', 'classrooms.name as class_name')
                         ->join('classrooms', 'classrooms.id', '=', 'student_attendances.class_id')
                         ->where('student_attendances.student_id','=',$student_id);

                         if(!empty(Request::get('class_name')))
                         {
                             $return = $return->where('classrooms.name','like', '%' .Request::get('class_name').'%');
                         }


                         if(!empty(Request::get('start_attendance_date')))
                         {
                             $return = $return->where('student_attendances.attendance_date','>=', (Request::get('start_attendance_date')));
                         }
                         if(!empty(Request::get('end_attendance_date')))
                         {
                             $return = $return->where('student_attendances.attendance_date','<=', (Request::get('end_attendance_date')));
                         }
                         if(!empty(Request::get('attendance_type')))
                         {
                             $return = $return->where('student_attendances.attendance_type','=', (Request::get('attendance_type')));
                         }


        $return = $return->orderBy('student_attendances.id','desc')
                         ->paginate(50);
         return  $return;

    }
    static public function getClassStudent($student_id)
    {

        return  self::select('student_attendances.*', 'classrooms.name as class_name')
                ->join('classrooms', 'classrooms.id', '=', 'student_attendances.class_id')
                ->where('student_attendances.student_id','=',$student_id)
                ->groupBy('student_attendances.class_id')
                ->get();

    }


}
