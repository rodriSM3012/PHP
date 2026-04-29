<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Relations\BelongsToMany;

class Lector extends Model
{
    protected $fillable = ['nombre', ' apellidos'];
    public function libros()
    {
        return $this->belongsToMany(Libro::class)
            ->wihtPivot(['id', 'fecha_prestamo', 'fecha_devolucion'])
            ->withTimeStamps();
    }
}
