<?php

namespace App\Services;

use Carbon\Carbon;

class AdmissionYearService
{
    public function getYear(): string
    {
        return Carbon::now()->format('Y');
    }

    public function generateAdmission($indexNumber): string
    {
        //1. Query the students table and get student info(Program)
        return $indexNumber;
    }

}
