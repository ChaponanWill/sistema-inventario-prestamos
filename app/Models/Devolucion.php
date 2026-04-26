<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Devolucion extends Model
{
    protected $guarded = [];

    // belongsTo préstamo
    public function prestamo():BelongsTo{
        return $this->belongsTo(Prestamo::class);
    }
}
