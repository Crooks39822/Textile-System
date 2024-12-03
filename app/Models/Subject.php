<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    static public function getRecord(){

        $return =self::select('subjects.*','users.name as created_by_name')
                         ->join('users','users.id','subjects.created_by');


                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('subjects.name','like', '%' .Request::get('name').'%');
                   }
                   if(!empty(Request::get('type')))
                   {
                       $return = $return->where('subjects.type','like', '%' .Request::get('type').'%');
                   }

                   if(!empty(Request::get('date')))
                   {
                       $return = $return->whereDate('subjects.created_at','=', (Request::get('date')));
                   }

                     //search box end
                   $return = $return->where('subjects.is_delete','=',0)
                                    ->orderBy('subjects.id','desc')
                                    ->paginate(10);
                                return  $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getSubject()
    {
        return self::select('subjects.*')
        ->join('users','users.id','subjects.created_by')
        ->where('subjects.is_delete','=',0)
        ->where('subjects.status','=',0)
        ->orderBy('subjects.name','asc')
        ->get();

    }
    static public function TotalSubject()
    {
        return self::select('subjects.id')
        ->join('users','users.id','subjects.created_by')
        ->where('subjects.is_delete','=',0)
        ->where('subjects.status','=',0)
        ->count();

    }
    

}
