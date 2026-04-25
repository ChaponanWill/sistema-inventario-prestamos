<?php

namespace App\Filament\Resources\Entradas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EntradaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('fecha')
                    ->date(),
                TextEntry::make('producto.nombre')
                    ->label('Producto'),
                TextEntry::make('cantidad')
                    ->numeric(),
                TextEntry::make('descripcion')
                    ->placeholder('-')
                    ->columnSpanFull(),
                
            ]);
    }
}
