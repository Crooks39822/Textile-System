<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksGrade extends Model
{
    use HasFactory;
    protected $table = 'marks_grades';
    static public function getRecord()
    {

        return self::select('marks_grades.*','users.name as created_by_name')
                         ->join('users','users.id','marks_grades.created_by')
                         ->orderBy('marks_grades.id','asc')
                         ->get();
                               
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getGrade($percent)
    {
        $return = self::select('marks_grades.*')
                         ->where('percent_from','<=',$percent)
                         ->where('percent_to','>=',$percent)
                         ->first();
         return !empty($return->name) ? $return->name : '';
                               
    }
    static public function getComment($percent)
    {
        $return = self::select('marks_grades.*')
                         ->where('percent_from','<=',$percent)
                         ->where('percent_to','>=',$percent)
                         ->first();
         return !empty($return->comments) ? $return->comments : '';
                               
    }
    
    
    
}
