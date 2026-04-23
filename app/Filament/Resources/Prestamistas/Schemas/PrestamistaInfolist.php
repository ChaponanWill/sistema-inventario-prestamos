<?php

namespace App\Filament\Resources\Prestamistas\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PrestamistaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('dni'),
                TextEntry::make('primer_nombre'),
                TextEntry::make('segundo_nombre')
                    ->placeholder('-'),
                TextEntry::make('primer_apellido'),
                TextEntry::make('segundo_apellido'),
                IconEntry::make('estado')
                    ->boolean(),
                TextEntry::make('area.id')
                    ->label('Area'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
