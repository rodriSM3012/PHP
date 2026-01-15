<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Ingrediente;

class PizzaIngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $pizzaMargarita = Pizza::where('nombre', 'Margarita')->first();
            $pizzaCuatroQuesos = Pizza::where('nombre', 'Cuatro quesos')->first();
            $pizzaPrimavera = Pizza::where('nombre', 'Primavera')->first();

            $mozzarella = Ingrediente::where('nombre', 'Mozzarella')->first();
            $parmesano = Ingrediente::where('nombre', 'Parmesano')->first();
            $gorgonzola = Ingrediente::where('nombre', 'Gorgonzola')->first();
            $provolone = Ingrediente::where('nombre', 'Provolone')->first();
            $tomate = Ingrediente::where('nombre', 'Tomate')->first();
            $rucula = Ingrediente::where('nombre', 'Rúcula')->first();

            $pizzaMargarita->ingredientes()->attach([$tomate->id, $mozzarella->id]);
            $pizzaCuatroQuesos->ingredientes()->attach([$tomate->id, $mozzarella->id, $parmesano->id, $gorgonzola->id, $provolone->id]);
            $pizzaPrimavera->ingredientes()->attach([$tomate->id, $mozzarella->id, $rucula->id]);
    }
}
