<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
        'indexNumber' => $row[1],
        'name'=> $row[2],
        'gender'=> $row[3],
        'phone'=> $row[4],
        'alternative_phone'=> $row[5],
        'email' => $row[6],
        'alternative_email'=> $row[7],
        'address'=> $row[8],
        'post_code'=> $row[9],
        'town'=> $row[10],
        'program_code'=> $row[11],
        'program'=> $row[12],
        'secondary_school'=> $row[13]
        ]);
    }

    public function startRow(): int
    {
        // TODO: Implement startRow() method.
        return 2;
    }
}
