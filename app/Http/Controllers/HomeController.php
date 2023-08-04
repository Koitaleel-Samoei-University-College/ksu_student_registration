<?php

namespace App\Http\Controllers;

use App\Models\DownloadCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $downloadCounts = DownloadCount::select('program', DB::raw('COUNT(student_id) as student_count'))
            ->selectRaw('SUM(CASE WHEN students.gender = "M" THEN 1 ELSE 0 END) as male_count')
            ->selectRaw('SUM(CASE WHEN students.gender = "F" THEN 1 ELSE 0 END) as female_count')
            ->join('students', 'download_counts.student_id', '=', 'students.id')
            ->groupBy('program')
            ->get();
        return view('home', compact('downloadCounts'));
    }
}
