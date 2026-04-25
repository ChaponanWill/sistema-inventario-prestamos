<?php

namespace App\Filament\Resources\Prestamos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PrestamoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('fecha_prestamo')
                    ->date(),
                TextEntry::make('producto.nombre')
                    ->label('Producto'),
                TextEntry::make('cantidad')
                    ->numeric(),
                TextEntry::make('fecha_devolucion')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('prestamista.dni')
                    ->label('Prestamista')
                    ->getStateUsing(function ($record) {
                        return $record->prestamista->dni . ' - ' . $record->prestamista->primer_nombre . ' ' . $record->prestamista->primer_apellido;
                    }),
                TextEntry::make('descripcion')
                    ->placeholder('-')
                    ->columnSpanFull(),
                
            ]);
    }
}
