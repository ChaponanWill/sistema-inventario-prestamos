<?php

namespace App\Filament\Resources\Devolucions\Pages;

use App\Filament\Resources\Devolucions\DevolucionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDevolucion extends CreateRecord
{
    protected static string $resource = DevolucionResource::class;

    protected function afterCreate(): void
    {
        $devolucion = $this->record;

        if ($devolucion->prestamo) {

            //restar del préstamo (no recomendado, pero lo estás usando)
            $devolucion->prestamo->decrement(
                'cantidad',
                $devolucion->cantidad_devuelta
            );

            // 🔺 sumar al producto
            if ($devolucion->prestamo->producto) {
                $devolucion->prestamo->producto->increment(
                    'cantidad',
                    $devolucion->cantidad_devuelta
                );
            }
        }
    }
}
