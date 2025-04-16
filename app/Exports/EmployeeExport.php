<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Style;

class EmployeeExport implements FromCollection, WithMapping,WithHeadings,WithStyles,WithEvents
{
    use RegistersEventListeners;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array
    {
        return [
           "Full Name",
           "EMPLOYEE Number",
           "Rate(DAY/HR)",
           "New Rate",
           "Phone No",
           "Department",
           "Gender",
           "ID NUMBER",
           "Position",
           "DOB",
           "AGE",
           "Employement Date"
        ];
    }
    public static function afterSheet(AfterSheet $event)
    {
        $headings = (new static)->headings();
        $columnCount = count($headings);
        
        // Determine the last column (e.g., A, B, C, ..., Z, AA, AB, etc.)
        $lastColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnCount);

        // Set auto size for each column
        foreach (range('A', $lastColumn) as $column) {
            $event->sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
        }

        // Get the cell range
     
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Bold the first row
            1    => ['font' => ['bold' => true]],
        ];
    }
    public function map($value):array
    {
        $student_name =  $value->name.' '. $value->last_name;
        
        return [
            $student_name,
            $value->admission_number,
            "E ".$value->roll_number,
            "E ".$value->new_rate,
            $value->phone,
            $value->class_name,
            $value->gender,
            "'".$value->id_number,
            $value->position,
            date('d-m-Y',strtotime($value->date_of_birth )),
            $value->age,
            date('d-m-Y',strtotime($value->admission_date ))
           
        ];
    }
    public function collection()
    {
        $remove_pagination = 1;
        return User::getStudent($remove_pagination);
    }
}
