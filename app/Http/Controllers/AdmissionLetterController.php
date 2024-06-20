<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\DownloadCount;
use App\Services\AdmissionNumberService;
use App\Services\DownloadCounterService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class AdmissionLetterController extends Controller
{
    public function index(): Factory|View|Application
    {
        $admissions = DB::table('admissions')
            ->join('students', 'admissions.student_id', '=', 'students.id')
            ->select('admissions.student_id','admissions.admission_number', 'students.name', 'students.indexNumber')
            ->paginate(20);
        return view('admission.index', compact('admissions'));
    }
    public function create(Request $request, AdmissionNumberService $admissionNumberService, DownloadCounterService $downloadCounterService): Response|Redirector|RedirectResponse|Application
    {
        //Validate Entered Adm Number
        if(!DB::table('students')->where('indexNumber',  $request['admissionNumber'])->exists()) {
            return redirect('/')->with('error', "The Index Number Doesn't Exits");
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
            $downloadCounterService->add_download_count($student_id->id, $request->ip());
            return $this->letter($student_id->id);
        }
        return redirect('/')->with('error', "The Index Number Doesn't Exits");
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
                'students.program_code',
                'students.admission_status',
                'admissions.admission_number'
            )
            ->first();
        //get school name
        $school = DB::table('programs')
            ->where('program_code', '=' , $student_data->program_code)
            ->select('school_name')
            ->first();
//        get the surname from name
        $surname = explode(" ", $student_data->name);

        // array for data
        $data = ["student_data" => $student_data, 'school' => $school, 'surname' => $surname[0]];
        // share data to view
        $pdf = PDF::loadView('admission.letter', $data);
        // download PDF file with download method
        return $pdf->download($student_data->admission_number.'.pdf');
    }
}
