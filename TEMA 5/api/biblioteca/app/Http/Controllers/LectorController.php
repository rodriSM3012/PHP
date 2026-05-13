<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use Illuminate\Http\Request;

class LectorController extends Controller
{
    public function index()
    {
        $lectores = Lector::all(); 
        return response()->json($lectores, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);
        $lector = Lector::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos
        ]);
        return response()->json([
            'mensaje' => 'Lector creado con éxito',
            'lector' => $lector
        ], 201);
    }

    public function show($id)
    {
        $lector = Lector::with(['libros' => function ($query) {
            $query->orderByPivot('fecha_prestamo', 'desc');
        }])->find($id);
        if (!$lector) {
            return response()->json(['mensaje' => 'Lector no encontrado'], 404);
        }
        return response()->json($lector, 200);
    }

    public function update(Request $request, $id)
    {
        $lector = Lector::find($id);
        if (!$lector) {
            return response()->json(['mensaje' => 'Lector no encontrado'], 404);
        }
        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'apellidos' => 'sometimes|required|string|max:255',
        ]);
        $lector->update($request->all());
        return response()->json([
            'mensaje' => 'Lector actualizado con éxito',
            'lector' => $lector
        ], 200);
    }

    public function destroy($id)
    {
        $lector = Lector::find($id);
        if (!$lector) {
            return response()->json(['mensaje' => 'Lector no encontrado'], 404);
        }
        $lector->delete();
        return response()->json(['mensaje' => 'Lector eliminado con éxito'], 200);
    }
}