<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Alumno;

class AlumnoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            $cursoLaravel = Curso::where('nombre', 'Laravel')->first();
            $cursoPHP = Curso::where('nombre', 'PHP')->first();

            $ana = Alumno::where('nombre', 'Ana')->first();
            $luis = Alumno::where('nombre', 'Luis')->first();

            $cursoLaravel->alumnos()->attach([$ana->id, $luis->id]);
            $cursoPHP->alumnos()->attach($ana->id);
        }
    }
}
