<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    protected $table = 'classrooms';

    static public function getRecord(){

        $return =self::select('classrooms.*','users.name as created_by_name')
                         ->join('users','users.id','classrooms.created_by');


                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('classrooms.name','like', '%' .Request::get('name').'%');
                   }


                   if(!empty(Request::get('date')))
                   {
                       $return = $return->whereDate('classrooms.created_at','=', (Request::get('date')));
                   }

                     //search box end
                   $return = $return->where('classrooms.is_delete','=',0)
                                    ->orderBy('classrooms.id','desc')
                                    ->paginate(10);
                                return  $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getClass()
    {
        $return =self::select('classrooms.*')
        ->join('users','users.id','classrooms.created_by')
        ->where('classrooms.is_delete','=',0)
        ->where('classrooms.status','=',0)
        ->orderBy('classrooms.name','asc')
        ->get();
               return  $return;
    }
    static public function TotalClass()
    {
        $return =self::select('classrooms.id')
        ->join('users','users.id','classrooms.created_by')
        ->where('classrooms.is_delete','=',0)
        ->where('classrooms.status','=',0)
         ->count();
               return  $return;
    }

    

}
