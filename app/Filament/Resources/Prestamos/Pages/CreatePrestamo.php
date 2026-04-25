<?php

namespace App\Filament\Resources\Prestamos\Pages;

use App\Filament\Resources\Prestamos\PrestamoResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePrestamo extends CreateRecord
{
    protected static string $resource = PrestamoResource::class;

    // función para bajar al stock(campo cantidad del producto)
    protected function afterCreate():void{
        $prestamo = $this->record; //
        if($prestamo->producto){
            $stockActual = $prestamo->producto->cantidad;
            // Validamos que no haya stock negativo
            if($stockActual>=$prestamo->cantidad){
                $prestamo->producto->decrement('cantidad',$prestamo->cantidad);
            } else{
                // Lanzar el error (No sirve igual de nada)
                throw new \Exception('No hay suficiente stock para el préstamo');
            }
        }
    }
}
