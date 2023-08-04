<?php

namespace App\Services;

use App\Models\DownloadCount;

class DownloadCounterService
{
    public function add_download_count($student_id, $ip): void
    {
        DownloadCount::firstOrCreate(
            ['student_id'=> $student_id],
            ['ip_address' => $ip]
        );
    }
}
