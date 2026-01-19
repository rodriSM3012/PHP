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
        return view('ingredientes.showAllIngredientes', compact('ingredientes'));
    }

    public function create()
    {
        return view("ingredientes.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required",
        ]);
    }

    public function edit()
    {
        return view('ingredientes.edit', compact('ingrediente'));
    }

    public function delete()
    {
        return view('ingredientes.confirmDelete');
    }

    public function destroy(Ingrediente $ingrediente)
    {
        $ingrediente->delete();
        return redirect()
            ->route('ingredientes.showAllIngredientes')
            ->with('success', 'Ingrediente eliminado correctamente');
    }
}
