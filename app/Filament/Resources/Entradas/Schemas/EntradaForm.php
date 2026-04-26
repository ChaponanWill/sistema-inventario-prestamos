<?php

namespace App\Filament\Resources\Entradas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EntradaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('fecha')
                    ->default(now())
                    ->required(),
                Select::make('producto_id')
                    ->relationship('producto', 'nombre')
                    ->preload()
                    ->searchable()
                    ->required(),
                TextInput::make('cantidad')
                    ->required()
                    ->numeric()
                    ->rules(['integer', 'min:1']),
                Textarea::make('descripcion')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
