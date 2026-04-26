<?php

namespace App\Filament\Resources\Prestamos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class PrestamoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('fecha_prestamo')
                    ->default(now())
                    ->required(),
                Select::make('producto_id')
                    ->relationship('producto', 'nombre')
                    ->preload()
                    ->searchable()
                    ->getOptionLabelFromRecordUsing(
                        fn($record) =>
                        $record->nombre . ' (' . intval($record->cantidad) . ')'
                    )
                    ->required(),
                TextInput::make('cantidad')
                    ->required()
                    ->numeric()
                    ->rules(['integer', 'min:1'])
                    ->rule(function ($get, $record) {

                        return function ($attribute, $value, $fail) use ($get, $record) {

                            $productoId = $get('producto_id');
                            $producto = \App\Models\Producto::find($productoId);

                            if (!$producto) return;

                            $stockDisponible = $producto->cantidad;

                            // 🔥 EDIT: mismo producto
                            if ($record && $record->producto_id == $productoId) {
                                $stockDisponible += $record->cantidad;
                            }

                            if ($value > $stockDisponible) {
                                $fail("No hay productos suficientes. Disponibles: {$stockDisponible}");
                            }
                        };
                    }),
                DatePicker::make('fecha_devolucion'),
                // Solo prestamistas con activo 1
                Select::make('prestamista_id')
                    ->placeholder('Buscar por DNI del prestamista')
                    ->relationship('prestamista', 'dni', fn(Builder $query, $get) => $query->where('estado', 1)->orWhere('id', $get('prestamista_id')))
                    ->searchable()
                    ->getOptionLabelFromRecordUsing(
                        fn($record) =>
                        $record->dni . ' - ' . $record->primer_nombre . ' ' . $record->primer_apellido
                    )
                    ->preload()
                    ->required(),
                Textarea::make('descripcion')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
