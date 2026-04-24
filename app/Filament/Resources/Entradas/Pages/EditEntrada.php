<?php

namespace App\Filament\Resources\Entradas\Pages;

use App\Filament\Resources\Entradas\EntradaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;


class EditEntrada extends EditRecord
{
    protected static string $resource = EntradaResource::class;

    // Variables para guardar valores originales
    protected $cantidadOriginal;
    protected $productoOriginal;

    // Antes de guardar
    protected function beforeSave(): void
    {
        $this->cantidadOriginal = $this->record->cantidad;
        $this->productoOriginal = $this->record->producto_id;
    }

    // Después de guardar
    protected function afterSave(): void
    {
        $entrada = $this->record;

        $original = $this->cantidadOriginal;
        $nuevo = $entrada->cantidad;

        //  Caso 1: mismo producto
        if ($this->productoOriginal == $entrada->producto_id) {

            $diferencia = $nuevo - $original;

            if ($entrada->producto) {
                $entrada->producto->increment('cantidad', $diferencia);
            }

        } else {
            // Caso 2: cambió de producto

            // restar al producto anterior
            $productoAnterior = \App\Models\Producto::find($this->productoOriginal);
            if ($productoAnterior) {
                $productoAnterior->decrement('cantidad', $original);
            }

            // sumar al nuevo producto
            if ($entrada->producto) {
                $entrada->producto->increment('cantidad', $nuevo);
            }
        }
    }


    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
            ->after(function ($record) {

                if ($record->producto) {
                    $stock = $record->producto->cantidad - $record->cantidad;

                    $record->producto->update([
                        'cantidad' => max(0, $stock),
                    ]);
                }

            }),
        ];
    }
}
