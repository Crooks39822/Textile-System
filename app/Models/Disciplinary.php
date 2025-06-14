<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disciplinary extends Model
{
    use HasFactory;
    protected $table = 'disciplinary';

    static public function getRecord()
    {

        $return =self::select('disciplinary.*','users.name as firstname','users.last_name as lastname','users.admission_number as clock_number','action_type.name as action_types')
                         ->join('users','users.id','disciplinary.user_id')
                          ->join('action_type','action_type.id', '=', 'disciplinary.actiontype');

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
                                $return = $return->where('disciplinary.created_at','>=', (Request::get('from_admission_date')));
                            }
                            if(!empty(Request::get('to_admission_date')))
                            {
                                $return = $return->where('disciplinary.created_at','<=', (Request::get('to_admission_date')));
                            }

                   $return = $return->where('disciplinary.is_delete','=',0)
                                    ->orderBy('disciplinary.user_id','asc')
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

    public function typess()
    {
        return $this->belongsTo(ActionType::class,'actiontype');
    }

    public function getDocument()
{
    if(!empty($this->document_file) && file_exists('upload/documents_action/'.$this->document_file))
    {
        return url('upload/documents_action/'.$this->document_file);
    }
    else
    {
        return "";
    }
}
}
