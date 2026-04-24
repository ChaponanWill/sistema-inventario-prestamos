<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestamo extends Model
{
    protected $guarded = [];
    // Relación de producto con Prestamo belongsTo
    public function producto():BelongsTo{
        return $this->belongsTo(Producto::class);
    }
    // Relación de prestamista con Prestamo belongsTo
    public function prestamista():BelongsTo{
        return $this->belongsTo(Prestamista::class);
    }
}
