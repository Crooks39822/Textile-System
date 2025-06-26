<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class PassOut extends Model
{
   protected $table = 'pass_outs';


     static public function getRecord()
    {

        $return =self::select('pass_outs.*','users.name as firstname','users.last_name as lastname','users.admission_number as clock_number')
                         ->join('users','users.id','pass_outs.user_id');
                         

                         if(!empty(Request::get('name')))
                         {
                             $return = $return->where('users.name','like', '%' .Request::get('name').'%');
                         }

                         if(!empty(Request::get('clock_no')))
                         {
                             $return = $return->where('users.admission_number', '=', (Request::get('clock_no')));
                         }

                        
                           if(!empty(Request::get('from_admission_date')))
                            {
                                $return = $return->where('pass_outs.created_at','>=', (Request::get('from_admission_date')));
                            }
                            if(!empty(Request::get('to_admission_date')))
                            {
                                $return = $return->where('pass_outs.created_at','<=', (Request::get('to_admission_date')));
                            }

                   $return = $return->where('pass_outs.is_delete','=',0)
                                    ->orderBy('pass_outs.created_at','asc')
                                    ->paginate(50);
                                return  $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function employee()
    {
        return $this->belongsTo(User::class,'user_id');
    }

   
}
