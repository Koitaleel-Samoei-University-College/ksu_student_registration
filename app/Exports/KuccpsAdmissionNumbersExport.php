<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KuccpsAdmissionNumbersExport implements FromCollection, WithHeadings,WithMapping
{
    protected $data;

    public  function  __construct($data){
        $this->data = $data;
    }
    public function collection(): Collection
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return ['S.No','Index_Number','Student_Name','Admission_Number','Gender','Phone_Number','Alternative_Phone_Number','Email','Alternative_Email','PO_Box','Postal_Code','Town','Programme_Code','Programme_Name'];
    }

    public function map($row): array
    {
        static $rowId = 0;
        $rowId++;

        // Convert the object to an array
        $rowData = (array) $row;
        return [
            $rowId,
            $rowData['Index_Number'],
            $rowData['Student_Name'],
            $rowData['Admission_Number'],
            $rowData['Gender'],
            $rowData['Phone_Number'],
            $rowData['Alternative_Phone_Number'],
            $rowData['Email'],
            $rowData['Alternative_Email'],
            $rowData['PO_Box'],
            $rowData['Postal_Code'],
            $rowData['Town'],
            $rowData['Programme_Code'],
            $rowData['Programme_Name']
        ];

    }
}
