<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pizza::create(['nombre' => 'Margarita', 'descripcion' => 'La mejor pizza del mundo mundial.', 'precio' => 10.50]);
        Pizza::create(['nombre' => 'Cuatro quesos', 'descripcion' => 'La segunda mejor pizza del mundo mundial.', 'precio' => 11.50]);
        Pizza::create(['nombre' => 'Primavera', 'descripcion' => 'La tercer mejor pizza del mundo mundial.', 'precio' => 12.50]);
    }
}
