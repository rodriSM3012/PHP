<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['titulo', 'autor', 'prestamo'];
    public function lectores()
    {
        return $this->belongsToMany(Lector::class)
            ->withPivot(['id', 'fecha_prestamo', 'fecha_devolucion'])
            ->withTimestamps();
    }
}
