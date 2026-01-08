<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
        Curso::create(['nombre' => 'Laravel']);
        Curso::create(['nombre' => 'PHP']);
        Curso::create(['nombre' => 'MySQL']);
    }}
