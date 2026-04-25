<?php

namespace App\Filament\Resources\Productos\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombre'),
                TextEntry::make('descripcion')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('image')
                    ->label('Imagen')
                    ->disk('public')
                    ->placeholder('-'),
                TextEntry::make('cantidad')
                    ->numeric(),
                TextEntry::make('unidad.nombre_corto')
                    ->label('Unidad'),
                TextEntry::make('categoria.nombre')
                    ->label('Categoria'),
                
            ]);
    }
}
