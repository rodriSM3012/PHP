<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Pizza;

class PizzaIngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pizzaCuatroQuesos = Pizza::where('nombre', 'Cuatro quesos')->first();
        // TODO
    }
}
