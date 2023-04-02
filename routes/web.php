<?php

use App\Http\Controllers\AdmissionLetterController;
use App\Http\Controllers\KuccpsUploadController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentListController;
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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('file-import', [KuccpsUploadController::class, 'fileImport'])->name('file-import');
    Route::get('file-import', [KuccpsUploadController::class, 'index'])->name('file-import');
    Route::get('/students', [StudentListController::class, 'index'])->name('students');
    Route::resource('programs', ProgramController::class);

    Route::get('/admission_letter', [AdmissionLetterController::class, 'index'])->name('admission_letter');


