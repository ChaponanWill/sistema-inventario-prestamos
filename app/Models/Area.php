<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $guarded=[];

    public function prestamista(){
        return $this->hasMany(Prestamista::class);
    }
}
