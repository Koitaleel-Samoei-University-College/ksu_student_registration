<?php

namespace App\Services;

use Carbon\Carbon;

class AdmissionYearService
{
    public function getYear(): string
    {
        return Carbon::now()->format('Y');
    }

}
