<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Services\AdmissionNumberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionLetterController extends Controller
{
    //
    public function index(Request $request, AdmissionNumberService $admissionNumberService)
    {
        //Validate Entered Adm Number
        if(!DB::table('students')->where('indexNumber',  $request->admissionNumber)->exists()) {
            return redirect('/')->with('error', "The Admission Number Doesn't Exits");
        }

       dd($admissionNumberService->generateAdmission($request->admissionNumber));

        //get the lastinsertedID and check the year and increment by 1
        // insert the details to admissions table
        // generate the admission letter and download

//        return $request->admissionNumber;
    }
}
