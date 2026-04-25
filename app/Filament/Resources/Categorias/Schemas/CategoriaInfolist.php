<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CategoriaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombre'),
                TextEntry::make('descripcion')
                    ->label('Descripción')
                    ->placeholder('-'),
                IconEntry::make('estado')
                    ->boolean(),
                
            ]);
    }
}
