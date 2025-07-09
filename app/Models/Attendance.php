<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'mtf_attendances';

     protected $fillable = [
        'employee_number',
        'date',
        'check_in',
        'check_out',
    ];

    // Optional: Accessor for hours worked
  public function getWorkedHoursAttribute()
{
    if (!$this->check_in || !$this->check_out) {
        return 0;
    }

    $checkIn = \Carbon\Carbon::parse($this->check_in);
    $checkOut = \Carbon\Carbon::parse($this->check_out);

    // Clamp early check-in to 07:00 AM
    $officialStart = \Carbon\Carbon::createFromTimeString('07:00:00')->setDateFrom($checkIn);
    if ($checkIn->lt($officialStart)) {
        $checkIn = $officialStart;
    }

     $endStart = \Carbon\Carbon::createFromTimeString('16:45:00')->setDateFrom($checkOut);
    if ($checkOut->gt($endStart)) {
        $checkOut = $endStart;
    }
    // ❌ DO NOT clamp check-out
    // This lets us handle partial day work (e.g. 07:00 – 12:06)

    // If invalid (e.g., out before in)
    
    if ($checkIn->gte($checkOut)) {
        return 0;
    }

    $totalMinutes = $checkIn->diffInMinutes($checkOut);

    $lunchTime = 45;
$lunchThreshold = \Carbon\Carbon::createFromTimeString('12:00:00')->setDateFrom($checkIn);

        // Deduct lunch only if check-in was before 12:00 and check-out was after 12:00
        if ($checkIn->lt($lunchThreshold) && $checkOut->gt($lunchThreshold)) {
            $totalMinutes -= $lunchTime;
        }

        // Ensure total is not negative
        return max($totalMinutes, 0);

}






private function fetchAttendanceData(Request $request)
{
    $query = Attendance::with('user');

    if ($request->filled('employee_number')) {
        $query->where('employee_number', $request->input('employee_number'));
    }

    $query->whereBetween('date', [
        $request->input('from') ?? now()->startOfMonth(),
        $request->input('to') ?? now()->endOfMonth()
    ]);

    return ['records' => $query->get()];
}



public function getOvertimeMinutesAttribute()
{
    if (!$this->check_out) {
        return 0;
    }

    $checkOut = \Carbon\Carbon::parse($this->check_out);
    $overtimeStart = \Carbon\Carbon::createFromTimeString('17:00:00')->setDateFrom($checkOut);

    if ($checkOut->lte($overtimeStart)) {
        return 0;
    }

    return $overtimeStart->diffInMinutes($checkOut);
}



    public function user()
    {
        return $this->belongsTo(User::class, 'employee_number', 'admission_number');
    }

}
