<?php

namespace App\Http\Controllers;

use App\Exports\KuccpsAdmissionNumbersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportAdmissionNumberController extends Controller
{
    public function index()
    {
        $data = DB::table('students')
            ->join('admissions', 'students.id', '=' , 'admissions.student_id')
            ->select(
                'students.indexNumber as Index_Number',
                'students.name as Student_Name',
                'admissions.admission_number as Admission_Number',
                'students.gender as Gender',
                'students.phone as Phone_Number',
                'students.alternative_phone as Alternative_Phone_Number',
                'students.email as Email',
                'students.alternative_email as Alternative_Email',
                'students.address as PO_Box',
                'students.post_code as Postal_Code',
                'students.town as Town',
                'students.program_code as Programme_Code',
                'students.program as Programme_Name'
            )
            ->get();
        $data->transform(function ($item) {
            return (array) $item;
        });

        return Excel::download(new KuccpsAdmissionNumbersExport($data->toArray()), 'Kuccps_List_2023_With_Admission_Numbers.xlsx');

    }
}
