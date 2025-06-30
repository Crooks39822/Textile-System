<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\User;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\NoticeBoard;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use App\Models\StudentAddFee;
use App\Models\AssignmentSubmit;
use App\Models\StudentAttendance;
use App\Models\AssignClassTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function dashboard(Request $request)
    {
         $data = [];
        $data['header_title'] = 'Dashboard';
        if(Auth::User()->is_role == '1'){
            $data['TotalTodayFees'] = StudentAddFee::TotalTodayFees();
            $data['TotalFees'] = StudentAddFee::TotalFees();
            $data['TotalExam'] = Exam::TotalExam();
            $data['TotalClass'] = Classroom::TotalClass();
            $data['TotalSubject'] = Subject::TotalSubject();
            $data['TotalAdmin'] = User::getTotalUser(1);
            $data['TotalTeacher'] = User::getTotalUser(2);
            $data['getExited'] = User::getExiteds();
            $data['TotalStudent'] = User::getTotalUser(3);
            $data['TotalStaff'] = User::getTotalUser(5);
            $data['usersWithProbation'] = User::whereDay('probation_date', now()->day)
            ->whereMonth('probation_date', now()->month)
            ->get();
            $data['usersThisMonth'] = User::whereMonth('probation_date', now()->month)
            ->where('is_delete','=',0)
            ->where('status','=',0)
            ->where('probation_status','=',0)
            ->groupBy('id')
             ->get();



             

         if(!empty($request->year))
            {
            $year = $request->year;
            }
            else
            {

            $year = date('Y');
            }


            $getTotalCustomerMonth = '';
            $getTotalOrderMonth = '';
            for($month = 1; $month <= 12; $month++)
            {
            $startDate = new \DateTime("$year-$month-01");
            $endDate = new \DateTime("$year-$month-01");
            $endDate->modify('last day of this month');

            $start_date = $startDate->format('Y-m-d');
            $end_date = $endDate->format('Y-m-d');

            $customer = User::getTotalCustomerMonth($start_date, $end_date);
            $getTotalCustomerMonth .= $customer.',';

              

            }
            $data['TotalCustomer'] = rtrim($getTotalCustomerMonth, ",");
             $data['getTotalGenderM'] = User::getTotalGenderM();
                 $data['getTotalGenderF'] = User::getTotalGenderF();
                  $data['getTotalGenderO'] = User::getTotalGenderO();
            $data['year'] =  $year;

       

            $today = Carbon::today()->toDateString();
            


                $data['totalEmployees'] = User::where('is_role', 3)
                    ->where('is_delete', 0)
                    ->count();

                // Present employees today (based on distinct clock-ins)
                $data['presentToday'] = Attendance::where('date', $today)
                    ->distinct('employee_number')
                    ->count('employee_number');

                // Absent = total - present
                $data['absentToday'] = $data['totalEmployees'] - $data['presentToday'];

             

    // Get IDs of employees who clocked in today
                    $presentEmployeeIds = Attendance::where('date', $today)->pluck('employee_number')->toArray();

                    // Get employees who did NOT clock in today
                    $data['absentEmployees'] = User::where('is_role', 3) // assuming role 3 = employee
                    ->where('is_delete', 0) 
                        ->whereNotIn('admission_number', $presentEmployeeIds)
                        ->get();

                    $data['presentToday'] = count($presentEmployeeIds);
                    $data['absentToday'] = $data['absentEmployees']->count();
                    $data['absentToday'] = $data['absentEmployees']->count();




    $start = Carbon::now()->startOfMonth()->toDateString();
    $end = Carbon::now()->endOfMonth()->toDateString();

    $employees = User::where('is_role', 3)->where('is_delete', 0)->get();

    $attendanceMap = Attendance::whereBetween('date', [$start, $end])
        ->pluck('date', 'employee_number')
        ->groupBy(function ($date, $employee_number) {
            return $employee_number;
        });

    $consecutiveAbsenteeCount = 0;

    foreach ($employees as $employee) {
        $expectedDates = collect(Carbon::parse($start)->daysUntil($end))
            ->filter(fn($date) => !in_array($date->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY]))
            ->map(fn($date) => $date->toDateString());

        $presentDates = $attendanceMap[$employee->admission_number] ?? collect();
        $absentDates = $expectedDates->diff($presentDates)->values();

        // Group consecutive days
        $streak = [];
        $hasStreak = false;

        foreach ($absentDates as $i => $dateStr) {
            $current = Carbon::parse($dateStr);
            $previous = isset($absentDates[$i - 1]) ? Carbon::parse($absentDates[$i - 1]) : null;

            if ($previous && $current->diffInWeekdays($previous) === 1) {
                $streak[] = $dateStr;
            } else {
                if (count($streak) >= 2) {
                    $hasStreak = true;
                    break;
                }
                $streak = [$dateStr];
            }
        }

        if (count($streak) >= 3 || $hasStreak) {
            $consecutiveAbsenteeCount++;
        }
    }

    $data['consecutiveAbsentees'] = $consecutiveAbsenteeCount;

    // Add your existing dashboard data like:
    $data['totalEmployees'] = User::where('is_role', 3)->where('is_delete', 0)->count();
    $data['presentToday'] = Attendance::where('date', Carbon::today()->toDateString())->distinct('employee_number')->count('employee_number');
    $data['absentToday'] = $data['totalEmployees'] - $data['presentToday'];

            return view('backend.admin.list',$data);
        }
        elseif(Auth::user()->is_role == 2) 
        {
           
           
            return view('backend.teacher.list',$data);
        }
        elseif(Auth::user()->is_role == 3)
        {
            

            
            return view('backend.student.list',$data);
        }
        elseif(Auth::user()->is_role == 4)
        { 
           
          
            return view('backend.parent.list',$data);
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
