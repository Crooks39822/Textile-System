<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    protected $records;

    public function __construct($records)
    {
        $this->records = $records;
    }

   public function collection()
            {
                return $this->records->map(function ($record) {
                    return [
                        'Employee' => $record->employee_number,
                        'Name' => $record->user->name ?? '',
                        'Date' => $record->date,
                        'Clock In' => $record->clock_in,
                        'Clock Out' => $record->clock_out,
                        'Worked Hours' => round($record->worked_hours / 60, 2), // convert to hours
                    ];
                });
            }

        

    public function headings(): array
    {
        return [
            'Employee Number',
            'Name',
            'Date',
            'Clock In',
            'Clock Out',
            'Worked Hours',
        ];
    }
}
