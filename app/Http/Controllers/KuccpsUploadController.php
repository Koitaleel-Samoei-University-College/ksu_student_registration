<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KuccpsUploadController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('file-import');
    }

    /**
     * @return RedirectResponse
     */
    public function fileImport(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required'
        ]);
        try{
            Excel::import(new StudentImport, $request->file('file')->store('temp'));
            return redirect('/students');
        } catch (\Throwable $e){
//            dd($e->getMessage());
            return back()->withException($e);
        }

    }
}
