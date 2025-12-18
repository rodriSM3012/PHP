<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function inicio()
    {
        // return 'Página de inicio desde el controlador';
        return view('miprimeravista');
    }

    public function contacto()
    {
        return 'Página de contacto';
        // hacer la vista de contacto
    }

    public function saludo()
    {
        $nombre = 'Paco';
        $nombre = 'Juan';
        return view('saludo', compact('nombre'));
    }

    public function muchosSaludos()
    {
        $nombres = ['Ana', 'Luis', 'María'];
        return view('muchosSaludos', compact('nombres'));
        // hacer la vista de contacto
    }

    public function plantilla01()
    {
        return view('plantilla01');
    }

    public function plantilla02()
    {
        return view('plantilla02');
    }

    public function saludopersonalizado($nombre)
    {
        return view('saludoPersonalizado', compact('nombre'));
    }
}
