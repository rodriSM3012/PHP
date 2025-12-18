<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;

class CursosController extends Controller
{
    public function index()
    {
        //es como el get all
        $cursos = Curso::all();
        return view("cursos.index", compact("cursos"));
    }
}
