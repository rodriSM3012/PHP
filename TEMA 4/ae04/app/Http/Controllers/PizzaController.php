<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Ingrediente;

class PizzaController extends Controller
{
    public function showAllPizzas()
    {
        $pizzas = Pizza::all();
        return view('pizzas.showAllPizzas', compact('pizzas'));
    }

    public function showOnePizza($id)
    {
        $pizza = Pizza::with('ingredientes')->findOrFail($id);
        return view('pizzas.showOnePizza', compact('pizza'));
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

    public function edit($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.edit', compact('pizza'));
    }

    public function update(Request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);
    }

    public function delete($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.confirmDelete', compact('pizza'));
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return redirect()
            ->route('pizzas.showAllPizzas')
            ->with('success', 'Pizza eliminada correctamente');
    }
}
