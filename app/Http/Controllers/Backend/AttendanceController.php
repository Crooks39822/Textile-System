<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\StudentAttendance;
use App\Models\AssignClassTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function AttendanceStudent(Request $request)
    {
        $data['getClass'] = Classroom::getClass();
        if(!empty($request->get('attendance_date')) && !empty($request->get('class_id')))
        {

            $data['getStudent']= User::getStudentClass($request->get('class_id'));
        }
        $data['header_title'] = 'Employee Attendance List';

        return view('backend/attendance/employee',$data);
    }

    public function AttendanceStudentSubmit(Request $request)
    {

        $check_attendance = StudentAttendance::CheckAlreadyAttendance($request->student_id,$request->attendance_date,$request->class_id);

        if(!empty($check_attendance))
        {
            $attendance = $check_attendance;
        }
        else
        {
        $attendance = new StudentAttendance;
        $attendance->class_id = $request->class_id;
        $attendance->attendance_date = $request->attendance_date;
        $attendance->student_id = $request->student_id;
        $attendance->created_by = Auth::user()->id;

        }

        $attendance->attendance_type = $request->attendance_type;
        $attendance->save();

        $json['message'] = "Employee Attendance Successfully Saved";
        echo json_encode($json);
    }
        public function AttendanceReport(Request $request)
        {
            $data['getClass'] = Classroom::getClass();
            $data['getRecord'] = StudentAttendance::getRecord();

            $data['header_title'] = 'Attendance Report';
            return view('backend/attendance/attendance_report',$data);

        }

        public function AttendanceStudentTeacher(Request $request)
        {
            $getClass = AssignClassTeacher::MyClassSubjectsGroup(Auth::user()->id);
            $classarray = array();
            foreach($getClass as $value)
            {

                $classarray[] = $value->class_id;
            }
            if(!empty($request->get('attendance_date')) && !empty($request->get('class_id')))
        {

            $data['getStudent']= User::getStudentClass($request->get('class_id'));
        }
            $data['getClass'] = $getClass;
            // dd($data['getClass']);
            $data['getRecord'] = StudentAttendance::getRecordTeacher($classarray);
            $data['header_title'] = 'Employee Attendance List';

            return view('backend/teacher/student',$data);

        }

        public function AttendanceReportTeacher(Request $request)
        {

            $data['getClass'] = AssignClassTeacher::MyClassSubjectsGroup(Auth::user()->id);
            $data['getRecord'] = StudentAttendance::getRecord();

            $data['header_title'] = 'Attendance Report';
            return view('backend/teacher/attendance_report',$data);

        }

        //student side
        public function MyAttendance()
        {
            $data['getRecord'] = StudentAttendance::getRecordStudent(Auth::user()->id);
            $data['getClass'] = StudentAttendance::getClassStudent(Auth::user()->id);
            $data['header_title'] = 'My Attendance';
            return view('backend/student/my_attendance',$data);
        }
public function MyAttendanceParent($student_id)
{

    $getStudent = User::getSingle($student_id);
    $data['getStudent'] = $getStudent;
    $data['getRecord'] = StudentAttendance::getRecordStudent($student_id);
    $data['getClass'] = StudentAttendance::getClassStudent($student_id);

    $data['header_title'] = 'Student Attendance';
    return view('backend/parent/my_attendance',$data);
}
}
