<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\PassOut;
use App\Exports\ENPFList;
use App\Models\LeaveType;
use Illuminate\Support\Str;
use App\Mail\UserCreateMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class PassOutController extends Controller
{
    public function list(Request $request)
    {
      
      $data['getRecord'] = PassOut::getRecord();
      $data['header_title'] = 'Employee PassOut List';
       
        return view('backend/passout/list',$data);
    }

    public function add()
    {
      // $data['getRecord'] = Leave::getRecord();
      $data['getLeaveType'] = LeaveType::getRecord();
      $data['header_title'] = 'Add New PassOut';
       return view('backend/passout/add',$data);
    }
    
    public function SearchUser(Request $request)
    {
        $json = array();
        if(!empty($request->search))
        {
            $getUser = User::SearchUser($request->search);
            foreach($getUser as $value)
            {
            $type = '';
            if($value->is_role == 1)
            {
                $type = 'Admin';
            }
            elseif($value->is_role == 2)
            {
                $type = 'Supervisor';
            }
            elseif($value->is_role == 3)
            {
                $type = 'Employee';
            }
            elseif($value->is_role == 4)
            {
                $type = 'Parent';
            }
            $name = $value->name.' '.$value->last_name.'-'.$value->admission_number.'-'.$type;
            $json[] = ['id'=>$value->id, 'text'=>$name];
            }
        }
        echo json_encode($json);

    }
    public function register(Request $request)
    {
      
      $passout = new PassOut;
      $passout->user_id  =trim($request->user_id);
      $passout->reason  =trim($request->reason);
      $passout->time_out  =trim($request->time_out);
      $passout->status  = 'pending';
     
     
    
     

      $passout->save();
      

      return redirect('passout/list')->with('success','PassOut Successfully Added');

    }

    public function edit($id)
    {

     
      $data['getRecord'] = PassOut::getSingle($id);
      if(!empty($data['getRecord']))
      {

        $data['header_title'] = 'Edit PassOut';
         return view('backend/passout/edit',$data);

      }
      else
      {

        abort(404);
      }


    }
    public function update($id, Request $request)
    {
     
        
      $passout = PassOut::getSingle($id);
      
      $passout->time_in  =trim($request->time_in);
      $passout->status  = 'returned';
      $passout->save();
      

      return redirect('passout/list')->with('success','PassOut Successfully Update');

    }
    public function delete($id)
    {
      $getRecord = PassOut::getSingle($id);
      if(!empty($getRecord))
      {
       
        $getRecord->delete();
        return redirect()->back()->with('success','PassOut Successfully Deleted');
      }else
      {
        abort(404);
      }

    }


    
public function monthlyReport(Request $request)
{
    $employees = User::where('is_role', 3)->get();

    $month = $request->input('month', now()->format('Y-m')); // e.g. 2025-06
    $employeeId = $request->input('user_id');

    $query = PassOut::with('employee')
        ->whereYear('time_out', Carbon::parse($month)->year)
        ->whereMonth('time_out', Carbon::parse($month)->month);

    if ($employeeId) {
        $query->where('user_id', $employeeId);
    }

    $passOuts = $query->orderBy('time_out', 'desc')->get();

    // Group by employee
    $grouped = $passOuts->groupBy('user_id');

    $summary = [];

    foreach ($grouped as $employeeId => $records) {
        $totalMinutes = 0;

        foreach ($records as $record) {
            if ($record->time_in) {
                $totalMinutes += Carbon::parse($record->time_out)->diffInMinutes($record->time_in);
            }
        }

        $summary[] = [
            'employee' => $records->first()->employee,
            'count' => $records->count(),
            'duration' => $totalMinutes,
            'details' => $records,
        ];
    }
        $header_title = 'Monthly Pass-out';
    return view('backend/passout/report', compact('employees', 'summary', 'month', 'employeeId','header_title'));

  }
    
    public function todayPassOuts()
    {
        $today = Carbon::today();

        $passOuts = PassOut::with('employee')
            ->whereDate('time_out', $today)
            ->orderBy('time_out', 'desc')
            ->get();
$header_title = 'Todays Pass-out';
        return view('backend/passout/today', compact('passOuts','header_title'));
    }



}
