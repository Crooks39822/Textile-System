<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveType extends Model
{
    use HasFactory;
    protected $table = 'leave_type';
    static public function getRecord(){
       
        $return =self::select('leave_type.*','users.name as created_by_name')
                         ->join('users','users.id','leave_type.created_by');
                                        
                                       
                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('leave_type.name','like', '%' .Request::get('name').'%');
                   }
                  
                 
                   if(!empty(Request::get('date')))
                   {
                       $return = $return->whereDate('leave_type.created_at','=', (Request::get('date')));
                   }

                     //search box end
                   $return = $return->where('leave_type.is_delete','=',0)
                                    ->orderBy('leave_type.id','asc')
                                    ->paginate(10);
                                return  $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getAcademicYear()
    {
        $return =self::select('leave_type.*')
        ->join('users','users.id','leave_type.created_by')
        ->where('leave_type.is_delete','=',0)
        ->where('leave_type.status','=',0)
        ->orderBy('leave_type.name','desc')
        ->get();
               return  $return;
    }
}
