<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActionType extends Model
{
    use HasFactory;
    protected $table = 'action_type';
    static public function getRecord(){
       
        $return =self::select('action_type.*','users.name as created_by_name')
                         ->join('users','users.id','action_type.created_by');
                                        
                                       
                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('action_type.name','like', '%' .Request::get('name').'%');
                   }
                  
                 
                   if(!empty(Request::get('date')))
                   {
                       $return = $return->whereDate('action_type.created_at','=', (Request::get('date')));
                   }

                     //search box end
                   $return = $return->where('action_type.is_delete','=',0)
                                    ->orderBy('action_type.id','asc')
                                    ->paginate(10);
                                return  $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getAcademicYear()
    {
        $return =self::select('action_type.*')
        ->join('users','users.id','action_type.created_by')
        ->where('action_type.is_delete','=',0)
        ->where('action_type.status','=',0)
        ->orderBy('action_type.name','desc')
        ->get();
               return  $return;
    }
}
