<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->paginate(9);
        return view('program.index', compact('programs'));
    }

    public function show(Program $program)
    {
        return view('program.show', compact('program'));
    }
}
