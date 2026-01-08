<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.show', compact('curso'));
    }
}
