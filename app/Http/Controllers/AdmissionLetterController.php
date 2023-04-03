<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Services\AdmissionNumberService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class AdmissionLetterController extends Controller
{
    public function index(Request $request, AdmissionNumberService $admissionNumberService): Response|Redirector|RedirectResponse|Application
    {
        //Validate Entered Adm Number
        if(!DB::table('students')->where('indexNumber',  $request['admissionNumber'])->exists()) {
            return redirect('/')->with('error', "The Admission Number Doesn't Exits");
        }
        //get student ID
        $student_id = DB::table('students')
            ->where('indexNumber', '=', $request['admissionNumber'])
            ->select('id')
            ->first();
        // check if admission number exits, then just download letter
        if(
            DB::table('admissions')
                ->join('students', 'admissions.student_id', '=', 'students.id')
                ->where('students.indexNumber', '=' ,$request['admissionNumber'])
                ->exists()
        ){
            return $this->letter($student_id->id);
        }
        //generate the admission number and save to the admissions table
       $generatedAdmission = implode("",$admissionNumberService->generateAdmission($request['admissionNumber']));

//        //save to database
        $admissions = new Admission();
        $admissions->student_id = $student_id->id;
        $admissions->admission_number = $generatedAdmission;
        $admissions->status = true;
        $admissions->save();
//
//        //generate letter and download
        return $this->letter($student_id->id);
    }

    public function letter($student_id): Response
    {
//        get student details
        $student_data = DB::table('students')
            ->join('admissions', 'students.id', '=', 'admissions.student_id')
            ->where('students.id', '=' ,$student_id)
            ->select(
                'students.name',
                'students.indexNumber',
                'students.phone',
                'students.alternative_phone',
                'students.gender',
                'students.address',
                'students.post_code',
                'students.town',
                'students.program',
                'admissions.admission_number'
            )
            ->first();
        //get school name
        $school = DB::table('programs')
            ->where('program_name', '=' , $student_data->program)
            ->select('school_name')
            ->first();
//        get the surname from name
        $surname = explode(" ", $student_data->name);

        // array for data
        $data = ["student_data" => $student_data, 'school' => $school, 'surname' => $surname[0]];
        // share data to view
        $pdf = PDF::loadView('admission.letter', $data);
        // download PDF file with download method
        return $pdf->download('KSUC_AdmissionLetter.pdf');
    }
}
