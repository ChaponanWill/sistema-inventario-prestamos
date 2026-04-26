<?php

namespace App\Filament\Resources\Devolucions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DevolucionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('prestamo.id')
                    ->label('Prestamo'),
                TextEntry::make('cantidad_devuelta')
                    ->numeric(),
                TextEntry::make('cantidad_mal_estado')
                    ->numeric(),
                TextEntry::make('fecha_devolucion')
                    ->date(),
                TextEntry::make('descripcion')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
