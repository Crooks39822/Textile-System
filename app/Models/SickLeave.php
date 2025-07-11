<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SickLeave extends Model
{
    //
    protected $table = 'sick_leave';


    protected $fillable = [
    'user_id', 'start_date', 'end_date', 'reason', 'doctor_note_path'
];
 public function user()
    {
        return $this->belongsTo(User::class);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
