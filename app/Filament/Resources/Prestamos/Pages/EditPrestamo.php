<?php

namespace App\Filament\Resources\Prestamos\Pages;

use App\Filament\Resources\Prestamos\PrestamoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPrestamo extends EditRecord
{
    protected static string $resource = PrestamoResource::class;
    // -----
    // guardar valores originales
    protected $cantidadOriginal;
    protected $productoOriginal;

    // antes de guardar
    protected function beforeSave(): void
    {
        $this->cantidadOriginal = $this->record->cantidad;
        $this->productoOriginal = $this->record->producto_id;
    }

    // después de guardar
    protected function afterSave(): void
    {
        $prestamo = $this->record;

        $original = $this->cantidadOriginal;
        $nuevo = $prestamo->cantidad;

        //  mismo producto
        if ($this->productoOriginal == $prestamo->producto_id) {

            if ($prestamo->producto) {
                // devolver lo anterior
                $prestamo->producto->increment('cantidad', $original);

                // restar lo nuevo
                $prestamo->producto->decrement('cantidad', $nuevo);
            }

        } else {
            //  cambió de producto

            // devolver al producto anterior
            $productoAnterior = \App\Models\Producto::find($this->productoOriginal);
            if ($productoAnterior) {
                $productoAnterior->increment('cantidad', $original);
            }

            // restar al nuevo producto
            if ($prestamo->producto) {
                $prestamo->producto->decrement('cantidad', $nuevo);
            }
        }
    }


    // ---

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
             DeleteAction::make()
                ->after(function ($record) {

                    if ($record->producto) {
                        // devolver stock
                        $record->producto->increment('cantidad', $record->cantidad);
                    }

                }),
        ];
    }
}
