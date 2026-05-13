<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Relations\BelongsToMany;
class Libro extends Model
{
    protected $fillable = ['titulo', 'autor', 'prestamo'];
    public function lectores()
    {
        return $this->belongsToMany(Libro::class)
            ->withPivot(['id', 'fecha_prestamo', 'fecha_devolucion'])
            ->withTimestamps();
    }
}
