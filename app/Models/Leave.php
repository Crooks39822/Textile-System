<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'leaves';

    static public function getRecord()
    {

        $return =self::select('leaves.*','users.name as firstname','users.last_name as lastname','users.admission_number as clock_number','leave_type.name as leave_types')
                         ->join('users','users.id','leaves.user_id')
                          ->join('leave_type','leave_type.id', '=', 'leaves.leave_type','left');

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
                                $return = $return->where('leaves.created_at','>=', (Request::get('from_admission_date')));
                            }
                            if(!empty(Request::get('to_admission_date')))
                            {
                                $return = $return->where('leaves.created_at','<=', (Request::get('to_admission_date')));
                            }

                   $return = $return->where('leaves.is_delete','=',0)
                                    ->orderBy('leaves.user_id','asc')
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

    public function getDocument()
{
    if(!empty($this->document_file) && file_exists('upload/documents_leave/'.$this->document_file))
    {
        return url('upload/documents_leave/'.$this->document_file);
    }
    else
    {
        return "";
    }
}
}
