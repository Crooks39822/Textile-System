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

    // Deduct lunch if clock-in was before 12:00 PM
    $lunchStart = \Carbon\Carbon::createFromTimeString('12:00:00')->setDateFrom($checkIn);
    if ($checkIn->lt($lunchStart)) {
        $totalMinutes -= 45;
    }

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
    if (!$this->check_out) return 0;

    $checkOut = \Carbon\Carbon::parse($this->check_out);
    $officialEnd = \Carbon\Carbon::createFromTimeString('16:45:00')->setDateFrom($checkOut);

    return $checkOut->gt($officialEnd)
        ? $checkOut->diffInMinutes($officialEnd)
        : 0;
}


    public function user()
    {
        return $this->belongsTo(User::class, 'employee_number', 'admission_number');
    }

}
