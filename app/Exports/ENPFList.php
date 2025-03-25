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

class ENPFList implements FromCollection, WithMapping,WithHeadings,WithStyles,WithEvents
{
    use RegistersEventListeners;
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function headings():array
    {
        return [
           "EMPLOYEENUMBER",
           "FIRSTNAME",
           "SURNAME",
           "DOB",
           "IDNUMBER",
           "GRADED TAX NUMBER",
           "CONTRIBUTION",
           "SUPPLEMENTARY CONT",
           "MONTHLYPENSALARY",
           "Gender",
           "MobileNumber"
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
       $salary = $value->roll_number;
       if($value->is_role == 5)
       $salary;
                      else
                      $salary = " ";
                     
               
        return [
            "MTF".$value->admission_number,
            $value->name,
            $value->last_name,
            date('d-m-Y',strtotime($value->admission_date )),
            "'".$value->id_number,
            "'".$value->tax_number,
            " ",
            " ",
            $salary,
            $value->gender,
            $value->phone,
                     
        ];
        
    }
    public function collection()
    {
        $remove_pagination = 1;
        return User::getENPF($remove_pagination);
    }
}
