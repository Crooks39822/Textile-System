<?php

namespace App\Http\Controllers\Backend;

use App\Models\Week;
use App\Models\ClassSubject;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssignClassTeacher;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassSubjectTimetable;
use App\Models\User;

class CalendarController extends Controller
{
    public function MyCalendar()
    {
        //calenda timetable

           $data['getMyTimetable'] = $this->getTimetable(Auth::user()->class_id);
           $data['getExamTimetable'] = $this->getExamTimetable(Auth::user()->class_id);
        $data['header_title'] = 'My Calendar';
        return view('backend/student/my_calendar',$data);

    }
    public function getExamTimetable($class_id)
    {
        $getExam  = ExamSchedule::getExam( $class_id);
        $result = array();
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamSchedule::getExamTimetable($value->exam_id,$class_id);
            $resultS =array();
            foreach($getExamTimetable as $valueS)
            {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_number'] = $valueS->room_number;
                $dataS['full_marks'] = $valueS->full_marks;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $resultS[] =  $dataS;
            }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;

        }
        return $result;
    }
    public function getTimetable($class_id)
    {
        $result = array();
            $getRecord = ClassSubject::mySubjects($class_id);
           foreach($getRecord as $value)
           {
            $dataS['name'] = $value->subject_name;

            $getWeeks = Week::getRecord();
            $week =array();
            foreach($getWeeks as $valueW)
            {
                $dataW = array();

                $dataW['week_name'] = $valueW->name;
                $dataW['fullcalendar_day'] = $valueW->fullcalendar_day;
                $ClassSubject =ClassSubjectTimetable::getRecordClassSubject($value->class_id,$value->subject_id,$valueW->id);
                if(!empty($ClassSubject))
                {
            $dataW['start_time'] = $ClassSubject->start_time;
            $dataW['end_time'] = $ClassSubject->end_time;
            $dataW['room_number'] = $ClassSubject->room_number;
            $week[] = $dataW;
                }
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
           }
           return $result;
    }

    //parent Side
    public function MyCalendarParent($student_id)
    {
        $getStudent = User::getSingle($student_id);
        $data['getStudent'] = $getStudent;
        $data['getMyTimetable'] = $this->getTimetable($getStudent->class_id);
        $data['getExamTimetable'] = $this->getExamTimetable($getStudent->class_id);
        $data['header_title'] = 'Student Calendar';
        return view('backend/parent/my_calendar',$data);

    }

    //Teacher side
    public function MyCalendarTeacher()
    {
        $teacher_id = Auth::user()->id;
        $data['getClassTimetable'] = AssignClassTeacher::getCalendarTeacher($teacher_id);
        $data['getExamTimetableTeacher']  = ExamSchedule::getExamTimetableTeacher($teacher_id);
        $data['header_title'] = 'My Calendar';
        return view('backend/teacher/my_calendar',$data);
    }
}
