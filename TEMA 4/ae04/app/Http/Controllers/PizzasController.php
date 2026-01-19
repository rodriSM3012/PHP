<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Ingrediente;

class PizzasController extends Controller
{
    public function showAllPizzas()
    {
        $pizzas = Pizza::all();
        return view('pizzas.showAllPizzas', compact('pizzas'));
    }

    public function create()
    {
        $ingredientes = Ingrediente::all();
        return view("pizzas.create", compact("ingredientes"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required",
            "descripcion" => "required",
        ]);
    }

    public function edit()
    {
        return view('pizzas.edit', compact('pizza'));
    }

    public function delete()
    {
        return view('pizzas.confirmDelete');
    }

    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
        return redirect()
            ->route('pizzas.showAllPizzas')
            ->with('success', 'Pizza eliminada correctamente');
    }
}
