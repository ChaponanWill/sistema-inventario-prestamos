<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prestamista extends Model
{
    protected $guarded = [];

    public function area() : BelongsTo{
        return $this->belongsTo(Area::class);
    }

    // HasMany con Prestamo
    public function prestamos():HasMany{
        return $this->hasMany(Prestamo::class);
    }
}
