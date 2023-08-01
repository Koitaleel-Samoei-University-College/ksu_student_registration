<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToModel, WithStartRow, WithValidation
{
    use Importable;
    /**
     * @param array $row
     *
     * @return Model|Student|null
     */
    public function model(array $row): Model|Student|null
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
        'program'=> $row[12]
        ]);
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
