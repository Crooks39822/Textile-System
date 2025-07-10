<?php

namespace App\Http\Controllers\Backend;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\AttendanceExport;
use App\Models\StudentAttendance;
use App\Models\AssignClassTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;

class AttendanceController extends Controller
{

     public function createManual() 
            { 

            $employees = User::whereIn('is_role', [2, 3])
             ->where('is_delete', 0)
            ->get(); 
              $header_title = 'Employee Attendance Request';
            return view('backend/attendance/manual_attendance', compact('employees','header_title'));

            } 
            public function storeManual(Request $request) 
            { 



         $request->validate([
                        'employee_number' => 'required', 
                        'date' => 'required|date', 
                         'clock_out' => 'nullable|date_format:H:i', ]); 
                        
        //                 $employeeNumber = $request->input('employee_number');
        //                  $date = $request->input('date');
        //                   $clockIn = $request->input('clock_in');
        //                    $clockOut = $request->input('clock_out');

        //  $existing = Attendance::where('employee_number', $employeeNumber)
        //               ->where('date', $date)
        //               ->first();
       
                        
                        
        //     if (!$existing || $existing->source == 'biometric') {
        //         Attendance::updateOrCreate(
        //         [
        //             'employee_number' => $employeeNumber,
        //             'date' => $date,
        //         ],
        //         [
        //             'check_in' => $clockIn,
        //             'check_out' => $clockOut,
        //             'source' => 'manual',
        //         ]

        //                 ); 
        Attendance::updateOrCreate( [ 
            'employee_number' => $request->employee_number,
            'date' => $request->date,
         ], 
            [ 
               
            'check_out' => $request->clock_out, ] ); 


             return redirect('attendance-report')->with('success', 'Attendance updated successfully.');
            } 

      public function exportExcel(Request $request)
        {
            $from = $request->input('from') ?? now()->startOfMonth()->toDateString();
            $to = $request->input('to') ?? now()->endOfMonth()->toDateString();
            $employee = $request->input('employee');

            $query = Attendance::with('user')
                ->whereBetween('date', [$from, $to])
                ->whereHas('user');

            if ($employee) {
                $query->where(function ($q) use ($employee) {
                    $q->where('employee_number', '=', $employee)
                    ->orWhereHas('user', function ($uq) use ($employee) {
                        $uq->where('name', 'like', "%$employee%");
                    });
                });
            }

            $records = $query->get();

            return Excel::download(new AttendanceExport($records), 'attendance_' . date('d-m-Y') . '.xls');
        }


          public function synclocal()
    {
        Artisan::call('sync:local-to-cpanel');

        return back()->with('success', 'Sync command executed successfully!');
    }

        public function sync()
        {
            Artisan::call('zkteco:sync');

            return redirect()->back()->with('success', 'ZKTeco Sync Completed!');
        }

     




public function exportPdf(Request $request)
{
    $from = $request->input('from') ?? now()->startOfMonth()->toDateString();
    $to = $request->input('to') ?? now()->endOfMonth()->toDateString();
    $employee = $request->input('employee');
    $payType = $request->input('pay_type');
    $department = $request->input('department');

    $query = Attendance::with('user.user_line') // ensure user_line is eager loaded
        ->whereBetween('date', [$from, $to])
        ->whereHas('user');

    if ($employee) {
        $query->where(function ($q) use ($employee) {
            $q->where('employee_number', '=', $employee)
              ->orWhereHas('user', function ($uq) use ($employee) {
                  $uq->where('name', 'like', "%$employee%");
              });
        });
    }

    if ($payType) {
        $query->whereHas('user', function ($uq) use ($payType) {
            $uq->where('pay_type', $payType);
        });
    }

    if ($department) {
        $query->whereHas('user.user_line', function ($q) use ($department) {
            $q->where('id', $department);
        });
    }

    $attendances = $query->get();

    $grouped = $attendances->groupBy('employee_number')->map(function ($group) {
        return [
            'employee' => $group->first()->user->name ?? 'Unknown',
            'class_id' => $group->first()->user->user_line->name ?? '',
            'last_name' => $group->first()->user->last_name ?? '',
            'employee_number' => $group->first()->employee_number,
            'total_minutes' => $group->sum('worked_hours'),
            'records' => $group
        ];
    })->sortBy('employee_number');

    $grandTotalMinutes = $attendances->sum('worked_hours');

    $pdf = Pdf::loadView('backend/attendance/pdf', compact(
        'grouped', 'from', 'to', 'employee', 'grandTotalMinutes', 'payType', 'department'
    ));

    return $pdf->download('attendance_report_' . now()->format('Ymd_His') . '.pdf');
}



public function report(Request $request)
{
    $from = $request->input('from') ?? now()->startOfMonth()->toDateString();
    $to = $request->input('to') ?? now()->endOfMonth()->toDateString();
    if ($from > $to) {
        [$from, $to] = [$to, $from];
    }

    $employee = $request->input('employee');
    $payType = $request->input('pay_type');
    $department = $request->input('department');

    $query = Attendance::with('user')
        ->whereBetween('date', [$from, $to])
        ->whereHas('user');

    if ($employee) {
        $query->where(function ($q) use ($employee) {
            $q->where('employee_number', '=', $employee)
              ->orWhereHas('user', function ($uq) use ($employee) {
                  $uq->where('name', 'like', "%$employee%");
              });
        });
    }

    if ($payType) {
        $query->whereHas('user', function ($uq) use ($payType) {
            $uq->where('pay_type', $payType);
        });
    }

    if ($department) {
        $query->whereHas('user', function ($uq) use ($department) {
            $uq->where('class_id', $department); // adjust if your column is different
        });
    }

    $attendances = $query->get();

    $grouped = $attendances->groupBy('employee_number')->map(function ($group) {
        return [
            'employee' => $group->first()->user->name ?? 'Unknown',
            'class_id' => $group->first()->user->user_line->name ?? '',
            'last_name' => $group->first()->user->last_name ?? '',
            'employee_number' => $group->first()->employee_number,
            'total_minutes' => $group->sum('worked_hours'),
            'records' => $group
        ];
    })->sortBy('employee_number');

    $grandTotalMinutes = $attendances->sum('worked_hours');
    $departments = \App\Models\Classroom::all(); // or Department::all()
    $header_title = 'Employee Attendance List';

    return view('backend/attendance/report', compact(
        'grouped', 'from', 'to', 'employee', 'payType', 'department', 'departments', 'grandTotalMinutes', 'header_title'
    ));
}






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
