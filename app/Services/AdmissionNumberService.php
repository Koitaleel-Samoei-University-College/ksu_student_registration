<?php

namespace App\Services;

use App\Models\Admission;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\NoReturn;
use function MongoDB\BSON\toJSON;

class AdmissionNumberService
{
    public function getYear(): string
    {
//        return Carbon::now()->format('Y');
        return "2022";
    }

    public function generateAdmission($indexNumber): array
    {
        $pad_char = 0;
        $pad_length = 4;
        if($this->getLastAdmissionYear() != 0 and $this->getLastAdmissionYear() === $this->getYear()){
            //get the admission number and increment by one
            $number =substr(
                DB::table('admissions')->get()->last()->admission_number,
                4,4
            );
            return [$this->getProgramCode($indexNumber),"/",str_pad(intval($number)+1, $pad_length, $pad_char, STR_PAD_LEFT),"/", $this->getYear()];
        } else {
            // start the admission number from one (001)
            return [$this->getProgramCode($indexNumber),"/","0001","/",$this->getYear()];
        }

    }

     public function numbers_generator(): void
     {

        $programs = [
            "BACHELOR OF COMMERCE",
            "BACHELOR OF EDUCATION (ARTS)",
            "BACHELOR OF EDUCATION (EARLY CHILDHOOD EDUCATION)"
        ];
        foreach ($programs as $program){
            $results[] = DB::table('students')
                ->where('program', '=', $program)
                ->select('id','indexNumber')
                ->get();

        }

         for ($i = 0; $i < count($results); $i++) {
             for ($j = 0; $j < count($results[$i]); $j++) {
                 $student_id = object_get($results[$i][$j], 'id');
                $Admission =  implode("",$this->generateAdmission(object_get($results[$i][$j], 'indexNumber')));

                 //save to database
                 $admissions = new Admission();
                 $admissions->student_id = $student_id;
                 $admissions->admission_number = $Admission;
                 $admissions->status = true;
                 $admissions->save();
             }
         }

    }
    
    // Optimized Code
//     public function numbers_generator(): void
// {
//     $programs = [
//         "BACHELOR OF COMMERCE",
//         "BACHELOR OF EDUCATION (ARTS)",
//         "BACHELOR OF EDUCATION (EARLY CHILDHOOD EDUCATION)"
//     ];

//     // Get all students from all programs
//     $students = DB::table('students')
//         ->whereIn('program', $programs)
//         ->select('id', 'indexNumber')
//         ->get();

//     // Iterate through the students and generate admission numbers
//     foreach ($students as $student) {
//         $admissionNumber = $this->generateAdmission($student->indexNumber);

//         // Save the admission number to the database
//         $admission = new Admission();
//         $admission->student_id = $student->id;
//         $admission->admission_number = $admissionNumber;
//         $admission->status = true;
//         $admission->save();
//     }
// }


    public function getProgramCode($indexNumber)
    {
        $student_program = DB::table('students')
            ->select('program')
            ->where('indexNumber', '=', $indexNumber)
            ->first();
        //get program_code
        $school_program = DB::table('programs')
            ->select('program_code')
            ->where('program_name', '=' , $student_program->program)
            ->first();

        return $school_program->program_code;
    }


    public function getLastAdmissionYear(): string
    {
        $lastYear = DB::table('admissions')->get()->last()->admission_number ?? '';
        if($lastYear != null) {
            return substr(
                $lastYear,
                -4
            );
        }
        return 0;
    }



}
