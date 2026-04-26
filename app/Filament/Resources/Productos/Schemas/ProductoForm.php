<?php

namespace App\Filament\Resources\Productos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

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
                TextEntry::make('cantidad')
                    ->state(fn ($record) => $record?->cantidad ?? 0),
                Select::make('unidad_id')
                    ->relationship('unidad', 'nombre_corto')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('categoria_id')
                    ->relationship('categoria', 'nombre', fn(Builder $query, $get) => $query->where('estado', 1)->orWhere('id', $get('categoria_id')))
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }
}
