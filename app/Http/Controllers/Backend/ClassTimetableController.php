<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Week;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassSubjectTimetable;


class ClassTimetableController extends Controller
{
    public function list(Request $request)
    {
        $data['getClass'] = Classroom::getClass();
        if(!empty($request->class_id))
            {
                $data['getSubject'] = ClassSubject::mySubjects($request->class_id);

            }
            $getWeek = Week::getRecord();
            $week =array();
            foreach($getWeek as $value)
            {
            $dataW = array();
            $dataW['week_id'] = $value->id;
            $dataW['week_name'] = $value->name;

            if(!empty($request->class_id) && !empty($request->subject_id))
            {
            $ClassSubject =ClassSubjectTimetable::getRecordClassSubject($request->class_id,$request->subject_id,$value->id);
            if(!empty($ClassSubject))
            {
        $dataW['start_time'] = $ClassSubject->start_time;
        $dataW['end_time'] = $ClassSubject->end_time;
        $dataW['room_number'] = $ClassSubject->room_number;
            }
            else
            {
        $dataW['start_time'] = '';
        $dataW['end_time'] = '';
        $dataW['room_number'] = '';
            }

        }
        else
        {

            $dataW['start_time'] = '';
            $dataW['end_time'] = '';
            $dataW['room_number'] = '';
        }
            $week[] =$dataW;
         }
            $data['week'] = $week;


        $data['header_title'] = 'Class Timetable';
        return view('backend/class_timetable/list',$data);

    }

    public function insert_update(Request $request)
        {
            //delete record if exists
        ClassSubjectTimetable::where('class_id','=',$request->class_id)->where('subject_id','=',$request->subject_id)->delete();
        // insert new records
            foreach($request->timetable as $timetable)
            {
            if(!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['room_number']))
            {
            $save = new ClassSubjectTimetable;
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->week_id = $timetable['week_id'];
            $save->start_time = $timetable['start_time'];
            $save->end_time = $timetable['end_time'];
            $save->room_number = $timetable['room_number'];
            $save->save();
            }
            }
            return redirect()->back()->with('success',"Class Timetable Successfuly Saved");
        }
        //student work side
        public function MyTimetable()
        {
            $result = array();
            $getRecord = ClassSubject::mySubjects(Auth::user()->class_id);
           foreach($getRecord as $value)
           {
            $dataS['name'] = $value->subject_name;

            $getWeeks = Week::getRecord();
            $week =array();
            foreach($getWeeks as $valueW)
            {
                $dataW = array();

                $dataW['week_name'] = $valueW->name;
                $ClassSubject =ClassSubjectTimetable::getRecordClassSubject($value->class_id,$value->subject_id,$valueW->id);
                if(!empty($ClassSubject))
                {
            $dataW['start_time'] = $ClassSubject->start_time;
            $dataW['end_time'] = $ClassSubject->end_time;
            $dataW['room_number'] = $ClassSubject->room_number;
                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }
                $week[] = $dataW;
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
           }

           $data['getRecord'] = $result;
            $data['header_title'] = 'My Timetable ';

          return view('backend/student/my_timetable',$data);

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
// teacher side
public function My_TimetableTeacher($class_id,$subject_id)
{



           $data['getClass'] = Classroom::getSingle($class_id);
           $data['getSubject'] = Subject::getSingle($subject_id);

            $getWeeks = Week::getRecord();
            $week =array();
            foreach($getWeeks as $valueW)
            {
                $dataW = array();

                $dataW['week_name'] = $valueW->name;
                $ClassSubject =ClassSubjectTimetable::getRecordClassSubject($class_id,$subject_id,$valueW->id);
                if(!empty($ClassSubject))
                {
            $dataW['start_time'] = $ClassSubject->start_time;
            $dataW['end_time'] = $ClassSubject->end_time;
            $dataW['room_number'] = $ClassSubject->room_number;
                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }
                $result[] = $dataW;
            }

            $data['getRecord'] = $result;
            $data['header_title'] = 'My Timetable ';

          return view('backend/teacher/my_timetable',$data);

}
//parent side my timetable



public function MyTimetableParent($class_id,$subject_id,$student_id)
{



           $data['getClass'] = Classroom::getSingle($class_id);
           $data['getSubject'] = Subject::getSingle($subject_id);
           $data['getStudent'] = User::getSingle($student_id);
            $getWeeks = Week::getRecord();
            $week =array();
            foreach($getWeeks as $valueW)
            {
                $dataW = array();

                $dataW['week_name'] = $valueW->name;
                $ClassSubject =ClassSubjectTimetable::getRecordClassSubject($class_id,$subject_id,$valueW->id);
                if(!empty($ClassSubject))
                {
            $dataW['start_time'] = $ClassSubject->start_time;
            $dataW['end_time'] = $ClassSubject->end_time;
            $dataW['room_number'] = $ClassSubject->room_number;
                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }
                $result[] = $dataW;
            }

            $data['getRecord'] = $result;
            $data['header_title'] = 'My Timetable ';

          return view('backend/parent/my_timetable',$data);

}


}
