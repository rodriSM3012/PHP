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
}
