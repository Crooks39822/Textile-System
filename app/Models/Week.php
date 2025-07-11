<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $table = 'weeks';

    static public function getRecord()
    {
    return Week::get();
    }

    static public function getWeekUsingName($weekname)
    {
    return Week::where('name', '=', $weekname)->first();
    }
}
