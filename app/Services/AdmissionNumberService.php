<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AdmissionNumberService
{
    public function getYear(): string
    {
        return Carbon::now()->format('Y');
    }

    public function generateAdmission($indexNumber): string
    {
        if($this->getLastAdmissionYear() == $this->getYear()){
            //get the admission number and increment by one
            return "Years Match";
        } else {
            // start the admission number
            return "Years Dont Match";
        }

    }

    public function getProgramCode($indexNumber)
    {
        $student_program = DB::table('students')
            ->select('program')
            ->where('indexNumber', '=', $indexNumber)
            ->get();
        //get program_code
        $school_program = DB::table('programs')
            ->select('program_code')
            ->where('program_name', '=' , $student_program[0]->program)
            ->get();

        return $school_program[0]->program_code;
    }


    public function getLastAdmissionYear(): string
    {
        return substr(
            DB::table('admissions')->get()->last()->admission_number,
            -4
        );
    }

}
