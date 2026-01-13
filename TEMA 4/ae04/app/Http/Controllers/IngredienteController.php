<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingrediente;

class IngredienteController extends Controller
{
    // showallingredientes
    public function showAllIngredientes()
    {
        $ingredientes = Ingrediente::all();
        return view('ingredientes.showAllPizzas', compact('ingredientes'));
    }
}
