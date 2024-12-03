<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentAddFee extends Model
{
    use HasFactory;
    protected $table = 'student_add_fees';

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getFees($student_id)
    {
        return self::select('student_add_fees.*','classrooms.name as class_name','users.name as created_by')
                        ->join('classrooms','classrooms.id','=','student_add_fees.class_id')
                        ->join('users','users.id','=','student_add_fees.created_by')
                        ->where('student_add_fees.student_id','=',$student_id)
                        ->where('student_add_fees.is_payment','=',1)
                        ->get();
    }

    static public function getPaidAmount($student_id,$class_id)
    {
        return self::where('student_add_fees.student_id','=',$student_id)
                    ->where('student_add_fees.class_id','=',$class_id)
                    ->sum('student_add_fees.paid_amount');
    }
static public function TotalTodayFees()
{
    return self::where('student_add_fees.is_payment','=',1)
                    ->whereDate('student_add_fees.created_at','=',date('Y-m-d'))
                    ->sum('student_add_fees.paid_amount');

}
static public function TotalFees()
{
    return self::where('student_add_fees.is_payment','=',1)
                        ->sum('student_add_fees.paid_amount');

}
static public function TotalPaidAmountStudent($student_id)
{
    return self::where('student_add_fees.is_payment','=',1)
                     ->where('student_add_fees.student_id','=',$student_id)
                        ->sum('student_add_fees.paid_amount');

}
static public function TotalPaidAmountStudentParent($student_ids)
{
    return self::where('student_add_fees.is_payment','=',1)
                     ->whereIn('student_add_fees.student_id',$student_ids)
                        ->sum('student_add_fees.paid_amount');

}


static public function getRecord()
{
    $return = self::select('student_add_fees.*','classrooms.name as class_name','users.name as created_by',
    'student.name as first_name','student.last_name as last_name','student.id_number as id_number')
    ->join('classrooms','classrooms.id','=','student_add_fees.class_id')
    ->join('users  as student','student.id','=','student_add_fees.student_id')
    ->join('users','users.id','=','student_add_fees.created_by');

                      if(!empty(Request::get('class_name')))
                        {
                            $return = $return->where('classrooms.name','like', '%' .Request::get('class_name').'%');
                        }
                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('student.name','like', '%' .Request::get('name').'%');

                        }
                        if(!empty(Request::get('last_name')))
                        {
                            $return = $return->where('student.last_name','like', '%' .Request::get('last_name').'%');

                        }

                        if(!empty(Request::get('start_created_date')))
                        {
                            $return = $return->where('student_add_fees.created_at','>=', (Request::get('start_created_date')));
                        }
                        if(!empty(Request::get('end_created_date')))
                        {
                            $return = $return->where('student_add_fees.created_at','<=', (Request::get('end_created_date')));
                        }

                        if(!empty(Request::get('id_number')))
                        {

                            $return = $return->where('student.id_number','like', '%' .Request::get('id_number').'%');
                        }
                        if(!empty(Request::get('payment_type')))
                        {
                            $return = $return->where('student_add_fees.payment_type','=', (Request::get('payment_type')));
                        }

 $return = $return->where('student_add_fees.is_payment','=',1)
    ->orderBy('student_add_fees.id','desc')
    ->paginate(50);
    return  $return;
}

}
