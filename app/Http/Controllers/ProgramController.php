<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $programs = Program::all();
        return view('program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'school_name' => 'required',
            'program_name' => 'required|unique:programs',
            'program_code' => 'required|unique:programs',
        ]);
        Program::create($request->all());
        return redirect()->route('programs.index')->with('success', 'Program Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Program $program
     * @return Application|Factory|View
     */
    public function edit(Program $program)
    {
        return view('program.edit', compact('program'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Program $program
     * @return RedirectResponse
     */
    public function update(Request $request, Program $program)
    {
        $program->update($request->all());

        return redirect()->route('programs.index')->with('success', 'Program updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
