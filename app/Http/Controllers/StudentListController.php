<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentListController extends Controller
{
    public function index()
    {
        $students = Student::paginate(50);
        return view('students', compact('students'));

    }
}
