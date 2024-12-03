<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkRegister extends Model
{
    use HasFactory;
    protected $table = 'mark_registers';
    static public function CheckAlreadyMark($student_id,$exam_id,$class_id,$subject_id)
    {

        return self::where('student_id','=',$student_id)->where('exam_id','=',$exam_id)->where('class_id','=',$class_id)
                                                        ->where('subject_id','=',$subject_id)->first();

    }
    static public function getExam($student_id)
    {
        return MarkRegister::select('mark_registers.*','exams.name as exam_name')
            ->join('exams','exams.id','=','mark_registers.exam_id')
            ->where('mark_registers.student_id','=',$student_id)
            ->groupBy('mark_registers.exam_id')
            ->get();

    }

    static public function getExamSubject($exam_id,$student_id)
    {
        return MarkRegister::select('mark_registers.*','exams.name as exam_name','subjects.name as subject_name')
        ->join('exams','exams.id','=','mark_registers.exam_id')
        ->join('subjects','subjects.id','=','mark_registers.subject_id')
        ->where('mark_registers.exam_id','=',$exam_id)
        ->where('mark_registers.student_id','=',$student_id)
        ->get();
    }
    static public function getClass($exam_id,$student_id)
    {
        return MarkRegister::select('classrooms.name as class_name')
        ->join('exams','exams.id','=','mark_registers.exam_id')
        ->join('classrooms','classrooms.id','=','mark_registers.class_id')
        ->join('subjects','subjects.id','=','mark_registers.subject_id')
        ->where('mark_registers.exam_id','=',$exam_id)
        ->where('mark_registers.student_id','=',$student_id)
        ->first();
    }
    
}
