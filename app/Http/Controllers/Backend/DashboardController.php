<?php

namespace App\Http\Controllers\Backend;

use App\Models\Exam;
use App\Models\User;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Assignment;
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
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if(Auth::User()->is_role == '1'){
            $data['TotalTodayFees'] = StudentAddFee::TotalTodayFees();
            $data['TotalFees'] = StudentAddFee::TotalFees();
            $data['TotalExam'] = Exam::TotalExam();
            $data['TotalClass'] = Classroom::TotalClass();
            $data['TotalSubject'] = Subject::TotalSubject();
            $data['TotalAdmin'] = User::getTotalUser(1);
            $data['TotalTeacher'] = User::getTotalUser(2);
            $data['TotalQC'] = User::getTotalUser(4);
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
