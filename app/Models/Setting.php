<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    static public function getSingle()
    {
        return self::find(1);
    }
    public function getLogo()
    {
        if(!empty($this->logo) && file_exists('upload/logo/'.$this->logo))
        {
            return url('upload/logo/'.$this->logo);
        }
        else
        {
            return "";
        }
    }
    public function getFavicon()
    {
        if(!empty($this->favicon) && file_exists('upload/favicon/'.$this->favicon))
        {
            return url('upload/favicon/'.$this->favicon);
        }
        else
        {
            return "";
        }
    }
}
