<?php

namespace App\Filament\Resources\Productos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                Textarea::make('descripcion')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Imagen')
                    ->image()
                    ->directory('productos')
                    ->disk('public')



                    ->image(),
                Hidden::make('cantidad')
                    ->default(0),
                Select::make('unidad_id')
                    ->relationship('unidad', 'nombre_corto')
                    ->required(),
                Select::make('categoria_id')
                    ->relationship('categoria', 'nombre')
                    ->required(),
            ]);
    }
}
