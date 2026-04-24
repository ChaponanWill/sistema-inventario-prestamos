<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    protected $guarded = [];

    // relación de belongsTo con Unidad
    public function unidad():BelongsTo{
        return $this->belongsTo(Unidad::class);
    }
    // relación de belongsTo con Categoria
    public function categoria():BelongsTo{
        return $this->belongsTo(Categoria::class);
    }

    // relación de hasMany con Entrada
    public function entradas():HasMany{
        return $this->hasMany(Entrada::class);
    }
    // relación de hasMany con Prestamo
    public function prestamos():HasMany{
        return $this->hasMany(Prestamo::class);
    }
}
