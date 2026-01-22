<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Libros::table('libros')->insert([
            [
                'nombre' => 'Cien años de soledad',
                'autor' => 'Gabriel García Márquez',
                'precio' => 25.50,
                'paginas' => 471,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => '1984',
                'autor' => 'George Orwell',
                'precio' => 18.90,
                'paginas' => 328,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
