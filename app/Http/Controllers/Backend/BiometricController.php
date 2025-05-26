<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use AgileBM\ZKLib\ZKLib;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MehediJaman\LaravelZkteco\LaravelZkteco;

class BiometricController extends Controller
{
    public function syncLogs()
    {
        $ip = '192.168.0.136'; // Replace with your device IP
        $port = 4370;

        $zk = new LaravelZkteco($ip, $port);
       

        if ($zk->connect()) {
           
            $zk->disableDevice();
            $attendance = $zk->getAttendance();
            dd($attendance);
            foreach ($attendance as $log) {
                $employee = User::where('admission_number', $log[1])->first();
            
                if ($employee) {
                    Attendance::updateOrCreate([
                        'employee_id' => $employee->admission_number,
                        'timestamp' => Carbon::parse($log[3])->format('Y-m-d H:i:s'),
                    ], [
                        'status' => $log[2],
                    ]);
                }
            }

           
            $zk->enableDevice();
            $zk->disconnect();

            return response()->json(['message' => 'Attendance logs synced successfully.']);
        }

        return response()->json(['error' => 'Unable to connect to the device.']);
    }



    
}
