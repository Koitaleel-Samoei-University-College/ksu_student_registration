<?php

namespace App\Imports;

use App\Models\Admission;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentListImport implements ToCollection, WithStartRow, WithValidation
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            $student = Student::create([
                'indexNumber' => $row[1],
                'name'=> $row[3],
                'gender'=> $row[4],
                'phone'=> $row[5],
                'alternative_phone'=> $row[6],
                'email' => $row[7],
                'alternative_email'=> $row[8],
                'address'=> $row[9],
                'post_code'=> $row[10],
                'town'=> $row[11],
                'program_code'=> $row[12],
                'program'=> $row[13]
            ]);

            Admission::create([
                'student_id' => $student->id,
                'admission_number' => $row[2],  // Adjust column index based on your data
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
            'indexNumber' => [
                'unique:students'
            ],
        ];
    }

}
