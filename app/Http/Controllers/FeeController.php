<?php

namespace App\Http\Controllers;

use App\Imports\FeesImport;
use App\Models\Admission;
use App\Models\NFMFee;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class FeeController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('fees.create');
    }
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'file' =>'required|file|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Import the Excel file
        Excel::import(new FeesImport, $file);

        // Return a success message
        return redirect()->back()->with('status', 'Fees imported successfully!');
    }

    public function downloadFeeLetter(Request $request): Response|RedirectResponse
    {
        $admissionNumber = $request->input('admission_number');

        // Find the student by admission number
        $admissions = Admission::where('admission_number', $admissionNumber)->first();

        if (!$admissions) {
            return redirect()->back()->withErrors(['error' => 'Student Record not found']);
        }

        // Find the fees for the student
        $fees = NFMFee::where('student_id', $admissions->student_id)->first();
        $student = Student::find($admissions->student_id);
//        get the surname from name
        $surname = explode(" ", $student->name);
        // Create a PDF view
        $pdf = PDF::loadView('fees.fee_letter', [
            'surname' => $surname,
            'admission' => $admissions,
            'student' => $student,
            'fees' => $fees,
        ]);

        // Download the PDF
        return $pdf->download($admissionNumber);
    }
}
