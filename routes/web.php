<?php

use App\Http\Controllers\AdmissionLetterController;
use App\Http\Controllers\ExportAdmissionNumberController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\KuccpsUploadController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('file-import', [KuccpsUploadController::class, 'fileImport'])->name('file-import');
    Route::get('file-import', [KuccpsUploadController::class, 'index'])->name('file-import');
    Route::get('/students', [StudentListController::class, 'index'])->name('students');

    Route::resource('programs', ProgramController::class);

    Route::get('/admission_letters', [AdmissionLetterController::class, 'index'])->name('admission_letters');
    Route::get('/admission_letter', [AdmissionLetterController::class, 'create'])->name('admission_letter');
    Route::get('/admission_letter_download/{student_id}', [AdmissionLetterController::class, 'letter'])->name('letter_download');

    Route::get('/download-excel', [ExportAdmissionNumberController::class, 'index'])->name('download_admission_list');
    Route::get('/student_upload', [StudentListController::class, 'upload'])->name('upload_students_list');
    Route::post('/student_upload', [StudentListController::class, 'store'])->name('students_import');
    Route::post('/fees/import', [FeeController::class, 'store'])->name('fees_import');
    Route::get('/fees', [FeeController::class, 'index'])->name('fees');
});

Route::get('/fees/download-pdf', [FeeController::class, 'downloadFeeLetter'])->name('fees_pdf');

