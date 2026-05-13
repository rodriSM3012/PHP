<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    protected $fillable = ['nombre', 'apellidos'];
    public function libros()
    {
        return $this->belongsToMany(Libro::class)
            ->withPivot(['id', 'fecha_prestamo', 'fecha_devolucion'])
            ->withTimestamps();
    }
}
