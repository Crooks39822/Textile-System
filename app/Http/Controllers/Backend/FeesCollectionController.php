<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\StudentAddFee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeesCollectionController extends Controller
{
    public function FeesCollection(Request $request)
    {
        $data['getClass'] = Classroom::getClass();
        if (!empty($request->all())) {
            $data['getRecord'] = User::getCllectFeeStudent();
        }
        $data['header_title'] = 'Fees Collection List';
        return view('backend/fees_collection/collect_fees',$data);
    }
    public function FeesCollectionAdd($student_id)
    {


        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['getFees'] = StudentAddFee::getFees($student_id);
        $data['getPaidAmount'] = StudentAddFee::getPaidAmount($student_id, $getStudent->class_id);

        $data['header_title'] = 'Add Collect Fees ';
        return view('backend/fees_collection/add_collect_fees',$data);

    }
    public function FeesCollectionInsert($student_id, Request $request)
    {

        $getStudent = User::getSingleClass($student_id);
        $getPaidAmount = StudentAddFee::getPaidAmount($student_id, $getStudent->class_id);
        if(!empty($request->paid_amount))
        {
            $RemainingAmount = $getStudent->amount - $getPaidAmount;
            if($RemainingAmount >= $request->paid_amount)
            {
                $remaining_amount_user = $RemainingAmount - $request->paid_amount;
                $payment = new StudentAddFee;
                $payment->student_id = $student_id;
                $payment->class_id = $getStudent->class_id;
                $payment->paid_amount = $request->paid_amount;
                $payment->total_amount = $RemainingAmount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->payment_type = $request->payment_type;
                $payment->remarks = $request->remarks;
                $payment->is_payment = 1;
                $payment->created_by = Auth::user()->id;
                $payment->save();
                return redirect()->back()->with('success','Fees Successfully Added');

            }
            else{
                return redirect()->back()->with('error','The Fees you Have Entered id Greater than owed Amount');
            }
        }
        else
        {
            return redirect()->back()->with('error','Please enter Amount that is atleast (E1.00)');
        }


    }
    public function FeesCollectionStudent(Request $request)
    {
        $student_id = Auth::user()->id;
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['getFees'] = StudentAddFee::getFees($student_id);
        $data['getPaidAmount'] = StudentAddFee::getPaidAmount($student_id, $getStudent->class_id);

        $data['header_title'] = 'Collect Fees Report ';
        return view('backend/student/collect_fees',$data);

    }
    public function FeesCollectionParent($student_id,Request $request)
    {

        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['getFees'] = StudentAddFee::getFees($student_id);
        $data['getPaidAmount'] = StudentAddFee::getPaidAmount($student_id, $getStudent->class_id);

        $data['header_title'] = 'Collect Fees Report ';
        return view('backend/parent/collect_fees',$data);

    }
public function FeesCollectionReport(Request $request)
{
    $data['getClass'] = Classroom::getClass();
    $data['getRecord'] = StudentAddFee::getRecord();


    $data['header_title'] = 'Fees Collection Report';
    return view('backend/fees_collection/collect_fees_report',$data);

}

}
