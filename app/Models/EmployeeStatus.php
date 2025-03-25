<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeStatus extends Model
{
    use HasFactory;
    protected $table = 'employee_status';
    static public function getRecord(){
       
        $return =self::select('employee_status.*','users.name as created_by_name')
                         ->join('users','users.id','employee_status.created_by');
                                        
                                       
                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('employee_status.name','like', '%' .Request::get('name').'%');
                   }
                  
                 
                   if(!empty(Request::get('date')))
                   {
                       $return = $return->whereDate('employee_status.created_at','=', (Request::get('date')));
                   }

                     //search box end
                   $return = $return->where('employee_status.is_delete','=',0)
                                    ->orderBy('employee_status.id','desc')
                                    ->paginate(10);
                                return  $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getAcademicYear()
    {
        $return =self::select('employee_status.*')
        ->join('users','users.id','employee_status.created_by')
        ->where('employee_status.is_delete','=',0)
        ->where('employee_status.status','=',0)
        ->orderBy('employee_status.name','desc')
        ->get();
               return  $return;
    }
}
