<?php

namespace App\Http\Controllers;

use App\Imports\StudentListImport;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentListController extends Controller
{
    public function index(): Factory|View|Application
    {
        $students = Student::paginate(50);
        return view('students', compact('students'));

    }

    public function upload(): Factory|View|Application
    {
        return view('students.student_upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'admission_status' => 'required',
        ]);
        try {
            Excel::import(new StudentListImport, $request->file('file')->store('temp'));
            return redirect('/students');
        } catch (\Throwable $th) {
            dd($th);
        }


    }
}
