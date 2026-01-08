<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnosController extends Controller
{
    public function showAlumnos()
    {
        $alumnos = Alumno::all();
        return view('alumnos.showAlumnos', compact('alumnos'));
    }

    public function showAlumno($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.showAlumno', compact('alumno'));
    }

    public function showAlumnosCurso()
    {
        $alumnos = Alumno::with('cursos')->get();
        return view('alumnos.showAlumnosCurso', compact('alumnos'));
    }

    public function showAlumnoCurso($id)
    {
        $alumno = Alumno::with('cursos')->findOrFail($id);
        return view('alumnos.showAlumnoCurso', compact('alumno'));
    }
}
