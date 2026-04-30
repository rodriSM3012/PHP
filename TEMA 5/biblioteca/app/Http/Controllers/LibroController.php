<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return response()->json($libros, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'prestamo' => 'boolean'
        ]);

        $libro = Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'prestamo' => $request->prestamo ?? false
        ]);

        return response()->json([
            'mensaje' => 'Libro creado con éxito',
            'libro' => $libro
        ], 201);
    }

    public function show($id)
    {
        $libro = Libro::with([
            'lectores' => function ($query) {
                $query->orderByPivot('fecha_prestamo', 'desc');
            }
        ])->find($id);
        return response()->json($libro, 200);
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::find($id);
        if (!$libro) {
            return response()->json(['mesnaje' => 'Libro no encontrado'], 404);
        }
    }

    public function perstarLibro($lector_id, $libro_id)
    {
        $libro = Libro::findOrFail($libro_id);
        $lector = Lector::findOrFail($lector_id);

        if ($libro->prestamo) {
            return response()->json(['mensaje' => 'Este libro ya se encuentra prestado actualmente.'], 400);
        }

        DB::transaction(function () use ($lector, $libro) {
            $lector->libros()->attach($libro->id, [
                'fecha_prestamo' => now(),
                'fecha_devolucion' => null
            ]);
            $libro->prestamo = true;
            $libro->save();
        });
        return response()->json(['mensaje' => 'Préstamo registrado con éxito.']);
    }

    public function devolverLibro($lector_id, $libro_id)
    {
        $libro = Libro::findOrFail($libro_id);
        $lector = Lector::findOrFail($lector_id);

        if (!$libro->prestamo) {
            return response()->json(['mensaje' => 'Este libro no consta como prestado.'], 400);
        }

        DB::transaction(function () use ($lector, $libro) {
            $lector->libros()->updateExistingPivot($libro->id, [
                'fecha_devolucion' => now()
            ]);
            $libro->prestamo = false;
            $libro->save();
        });
        return response()->json(['mensaje' => 'Devolución registrada con éxito.']);
    }
}
