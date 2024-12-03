<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';

    static public function getRecord()
    {

        $return =self::select('exams.*','users.name as created_by_name')
                         ->join('users','users.id','exams.created_by');

                         if(!empty(Request::get('name')))
                         {
                             $return = $return->where('exams.name','like', '%' .Request::get('name').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                             $return = $return->whereDate('exams.created_at','=', (Request::get('date')));
                         }

                   $return = $return->where('exams.is_delete','=',0)
                                    ->orderBy('exams.name','desc')
                                    ->paginate(50);
                                return  $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function TotalExam()
    {

        $return = self::select('exams.id','users.name as created_by_name')
                         ->join('users','users.id','exams.created_by')
                         ->count();
                         return  $return;
    }
}
