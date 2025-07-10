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
            


                $data['totalEmployees'] = User::whereIn('is_role', [2, 3])
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
                    $data['absentEmployees'] = User::whereIn('is_role', [2, 3]) // assuming role 3 = employee
                               ->where('is_delete', 0) 
                        ->whereNotIn('admission_number', $presentEmployeeIds)
                        ->get();

                    $data['presentToday'] = count($presentEmployeeIds);
                    $data['absentToday'] = $data['absentEmployees']->count();
                    $data['absentToday'] = $data['absentEmployees']->count();


$starts = Carbon::now()->startOfMonth()->toDateString();
$ends = Carbon::today()->toDateString(); // ⬅️ limit to today only


$employees = User::whereIn('is_role', [2, 3])
    ->where('is_delete', 0)
    ->get();

// Map of employee_number => [dates attended]
$attendanceData = Attendance::whereBetween('date', [$starts, $ends])
    ->get()
    ->groupBy('employee_number')
    ->map(function ($items) {
        return $items->pluck('date')->map(fn($d) => Carbon::parse($d)->toDateString())->unique()->sort()->values();
    });

$consecutiveAbsentees = 0;

foreach ($employees as $employee) {
    $admission = $employee->admission_number;

    // All working days (weekdays only)
    $workingDays = collect(Carbon::parse($starts)->daysUntil($ends))
        ->filter(fn($date) => !in_array($date->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY]))
        ->map(fn($date) => $date->toDateString());

    // Days they were present
    $presentDates = $attendanceData[$admission] ?? collect();

    // Days they were absent
    $absentDates = $workingDays->diff($presentDates)->values()->sort();

    // Find streaks of 3+ consecutive weekdays
    $streak = 1;
    $last = null;
    $found = false;

    foreach ($absentDates as $i => $dateStr) {
        $current = Carbon::parse($dateStr);

        if ($last && $last->copy()->addWeekday() == $current) {
            $streak++;
            if ($streak >= 3) {
                $found = true;
                break;
            }
        } else {
            $streak = 1;
        }

        $last = $current;
    }

    if ($found) {
        $consecutiveAbsentees++;
    }
}

// Send value to your dashboard blade
$data['consecutiveAbsentees'] = $consecutiveAbsentees;
    // Add your existing dashboard data like:
    $data['totalEmployees'] = User::whereIn('is_role', [2, 3])->where('is_delete', 0)->count();
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


 public function consecutiveAbsentees()
{
   $start = Carbon::now()->startOfMonth()->toDateString();
$end = Carbon::today()->toDateString(); // ⬅️ limit to today only


    $employees = User::whereIn('is_role', [2, 3])
        ->where('is_delete', 0)
        ->with('user_line') // Ensure department is eager-loaded
        ->get();

    $attendanceData = Attendance::whereBetween('date', [$start, $end])
        ->get()
        ->groupBy('employee_number')
        ->map(function ($items) {
            return $items->pluck('date')->map(fn($d) => Carbon::parse($d)->toDateString())->unique()->sort()->values();
        });

   $absenteeList = [];

foreach ($employees as $employee) {
    $admission = $employee->admission_number;

    $workingDays = collect(Carbon::parse($start)->daysUntil($end))
        ->filter(fn($date) => $date->isWeekday())
        ->map(fn($date) => $date->toDateString());

    $presentDates = $attendanceData[$admission] ?? collect();
    $absentDates = $workingDays->diff($presentDates)->values()->sort();

    $streak = [];
    $previousDate = null;

    $allStreaks = [];  // Collect all streaks for this employee

    foreach ($absentDates as $dateStr) {
        $current = Carbon::parse($dateStr);

        if ($previousDate) {
            $nextExpected = $previousDate->copy()->addDay();
            while ($nextExpected->isWeekend()) {
                $nextExpected->addDay();
            }

            if ($current->isSameDay($nextExpected)) {
                $streak[] = $current->toDateString();
            } else {
                // When streak breaks, check if it's long enough to save
                if (count($streak) >= 3) {
                    $allStreaks[] = $streak;
                }
                $streak = [$current->toDateString()];
            }
        } else {
            $streak = [$current->toDateString()];
        }

        $previousDate = $current;
    }

    // Check last streak after loop ends
    if (count($streak) >= 3) {
        $allStreaks[] = $streak;
    }

    if (count($allStreaks) > 0) {
        $absenteeList[] = [
            'employee' => $employee->name . ' ' . $employee->last_name,
            'employee_number' => $admission,
            'department' => $employee->user_line->name ?? 'N/A',
            'streaks' => $allStreaks,  // Multiple streaks here
        ];
    }



    }
    $header_title = 'Employee Absent for 3 Days or More';

    return view('backend.attendance.consecutive_absentees', compact('absenteeList','header_title'));
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
