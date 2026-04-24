<?php

namespace App\Filament\Resources\Entradas\Pages;

use App\Filament\Resources\Entradas\EntradaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEntrada extends CreateRecord
{
    protected static string $resource = EntradaResource::class;
    // Crear la función para aumentar el stock del producto al crear una entrada
    protected function afterCreate():void{
        $entrada = $this->record;  // Obtenemos la entrada recién creada
        $entrada->producto->increment('cantidad', $entrada->cantidad); // creamos una variable para acceder al producto relacionado con la entrada y aumentamos su cantidad usando el método increment, pasando el campo a aumentar y la cantidad de la entrada
    }
}
