<?php

namespace App\Services;

use App\Models\DownloadCount;

class DownloadCounterService
{
    public function add_download_count($student_id, $ip): void
    {
        $download_counter = new DownloadCount();
        $download_counter->student_id = $student_id;
        $download_counter->ip_address = $ip;
        $download_counter->save();
    }
}
