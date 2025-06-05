<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave  extends Model
{
    use HasFactory;
    protected $table = 'leaves';

    static public function getRecord()
    {

        $return =self::select('leaves.*','users.name as firstname','users.lastname as lastname','users.admission_number as clock_number')
                         ->join('users','users.id','leaves.user_id');

                         if(!empty(Request::get('user_id')))
                         {
                             $return = $return->where('leaves.user_id','like', '%' .Request::get('user_id').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                             $return = $return->whereDate('leaves.created_at','=', (Request::get('date')));
                         }

                   $return = $return->where('leaves.is_delete','=',0)
                                    ->orderBy('leaves.user_id','desc')
                                    ->paginate(50);
                                return  $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
