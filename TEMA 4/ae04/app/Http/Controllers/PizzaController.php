<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function showAllPizzas()
    {
        $pizzas = Pizza::all();
        return view('pizzas.showAllPizzas', compact('pizzas'));
    }

    public function showOnePizza($id)
    {
        $alumno = Pizza::with('ingredientes')->findOrFail($id);
        return view('pizzas.showOnePizza', compact('pizza'));
    }
}
