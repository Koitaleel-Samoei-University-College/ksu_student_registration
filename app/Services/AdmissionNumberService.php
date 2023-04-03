<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdmissionNumberService
{
    public function getYear(): string
    {
        return Carbon::now()->format('Y');
    }

    public function generateAdmission($indexNumber): array
    {
        $pad_char = 0;
        $pad_length = 4;
        if($this->getLastAdmissionYear() != 0 and $this->getLastAdmissionYear() == $this->getYear()){
            //get the admission number and increment by one
            $number =substr(
                DB::table('admissions')->get()->last()->admission_number,
                4,3
            );
            return [$this->getProgramCode($indexNumber),str_pad(intval($number)+1, $pad_length, $pad_char, STR_PAD_LEFT), $this->getYear()];
        } else {
            // start the admission number from one (001)
            return [$this->getProgramCode($indexNumber),"0001", $this->getYear()];
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
