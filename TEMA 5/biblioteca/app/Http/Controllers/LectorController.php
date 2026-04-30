<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lector;

class LectorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);
        $lector = Lector::create([

            'nombre' => $request->nombre,
            'apellidos' => $request->apelllidos
        ]);
        return response()->json([
            'mensaje' => 'LEctor creado con éxito',
            'lector' => $lector
        ], 201);
    }

    public function show($id)
    {
        $lector = Lector::with([
            'libros' => function ($query) {
                $query->orderByPivot('fecha_prestamo', 'desc');
            }
        ])->find($id);
        if ($lector) {
            return response()
                ->json(['mesnaje' => 'Lector no encontrado', 404]);
        }
        return response()->json($lector, 200);
    }

    public function update(Request $request, $id)
    {

    }
}
