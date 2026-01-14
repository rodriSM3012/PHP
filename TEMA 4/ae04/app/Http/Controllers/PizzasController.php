<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzasController extends Controller
{
    public function showAllPizzas()
    {
        $pizzas = Pizza::all();
        return view('pizzas.showAllPizzas', compact('pizzas'));
    }

    public function create()
    {
        $ingredientes = Ingredientes::all();
        return view("pizzas.create", compact("ingredientes"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required",
            "descripcion" => "required",

        ]);
    }
}
