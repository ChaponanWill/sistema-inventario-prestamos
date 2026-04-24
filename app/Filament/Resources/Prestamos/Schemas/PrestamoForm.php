<?php

namespace App\Filament\Resources\Prestamos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

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
                    ->required(),
                TextInput::make('cantidad')
                    ->required()
                    ->numeric(),
                DatePicker::make('fecha_devolucion'),
                Select::make('prestamista_id')
                    ->relationship('prestamista', 'dni')
                    ->required(),
                Textarea::make('descripcion')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
