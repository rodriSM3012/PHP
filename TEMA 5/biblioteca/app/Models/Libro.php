<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Relations\BelongsToMany;
class Libro extends Model
{
    protected $fillable = ['titulo', 'autor', ' prestado'];
    public function libros()
    {
        return $this->belongsToMany(Libro::class)
            ->wihtPivot(['id', 'fecha_prestamo', 'fecha_devolucion'])
            ->withTimeStamps();
    }
}
