<?php

namespace App\Imports;

use App\Models\Admission;
use App\Models\NFMFee;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FeesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return NFMFee
     */

    public function model(array $row)
    {
            // Find the student by admission number
        $student = Admission::where('admission_number', $row['adm_no'])->first();

        // If student exists, create a new fee record
        if ($student) {
            return new NFMFee([
                'student_id' => $student->student_id,
                // Map other fields from the Excel row to the Fee model
                'band' => $row['band'],
                'household_contribution' => $row['household_contribution'],
               // Add other fields as needed
            ]);
        }

        // If student doesn't exist, you can either skip this row or throw an exception
        // For this example, we'll skip the row
        return null;
    }
}
