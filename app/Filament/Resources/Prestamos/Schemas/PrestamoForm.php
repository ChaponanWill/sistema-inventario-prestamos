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
                    ->required(),
                Select::make('producto_id')
                    ->relationship('producto', 'nombre')
                    ->searchable()
                    ->getOptionLabelFromRecordUsing(fn ($record)=>
                        $record->nombre . ' (' . intval($record->cantidad) . ')'
                    )
                    ->required(),
                TextInput::make('cantidad')
                    ->required()
                    ->numeric()
                    ->rules(['integer', 'min:1'])
                    // No dejar insertar números superiores al stock disponible
                    ->rule(function ($get) {
                        return function ($attribute, $value, $fail) use ($get) {
                            $producto = \App\Models\Producto::find($get('producto_id'));

                            if ($producto && $value > $producto->cantidad) {
                                $fail("No hay productos suficientes . Tenemos disponibles:" . " ".intval($producto->cantidad) );
                            }
                        };
                    }),
                DatePicker::make('fecha_devolucion'),
                // Solo prestamistas con activo 1
                Select::make('prestamista_id')
                    ->relationship('prestamista', 'dni', fn(Builder $query, $get)=>$query->where('estado',1)->orWhere('id', $get('prestamista_id')))
                    ->searchable()
                    ->getOptionLabelFromRecordUsing(fn ($record)=>
                        $record->dni . ' - ' . $record->primer_nombre . ' ' . $record->primer_apellido
                    )
                    ->required(),
                Textarea::make('descripcion')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
