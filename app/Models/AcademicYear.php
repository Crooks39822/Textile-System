<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYear extends Model
{
    use HasFactory;
    protected $table = 'academic_years';
    static public function getRecord(){
       
        $return =self::select('academic_years.*','users.name as created_by_name')
                         ->join('users','users.id','academic_years.created_by');
                                        
                                       
                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('academic_years.name','like', '%' .Request::get('name').'%');
                   }
                  
                 
                   if(!empty(Request::get('date')))
                   {
                       $return = $return->whereDate('academic_years.created_at','=', (Request::get('date')));
                   }

                     //search box end
                   $return = $return->where('academic_years.is_delete','=',0)
                                    ->orderBy('academic_years.id','desc')
                                    ->paginate(10);
                                return  $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getAcademicYear()
    {
        $return =self::select('academic_years.*')
        ->join('users','users.id','academic_years.created_by')
        ->where('academic_years.is_delete','=',0)
        ->where('academic_years.status','=',0)
        ->orderBy('academic_years.name','desc')
        ->get();
               return  $return;
    }
}
