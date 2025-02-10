<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Setting;
use App\Models\Classroom;
use Illuminate\Support\Str;
use App\Mail\UserCreateMail;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ExitedController extends Controller
{
   
    public function list(Request $request)
    {
      $data['getClass'] = Classroom::getClass();
      $data['header_title'] = 'Exited Employess List';
        $data['getStudent'] = User::getExited();
       

        return view('backend/exited_employees/list',$data);
    }
    


}
