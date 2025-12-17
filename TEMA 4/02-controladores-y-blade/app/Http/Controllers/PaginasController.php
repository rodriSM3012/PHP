<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller // herencia de Controller
{
    // return 'Página de inicio desde el controlador'
    public function inicio()
    {
        return view('miprimeravista');
    }
}
