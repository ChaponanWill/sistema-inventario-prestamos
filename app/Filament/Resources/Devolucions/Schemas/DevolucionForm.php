<?php

namespace App\Filament\Resources\Devolucions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DevolucionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('prestamo_id')
                    ->label('Préstamo')
                    ->placeholder('Buscar por código de préstamo o DNI del prestamista')
                    ->searchable()
                    // La búsqueda debe incluir el ID del préstamo, el DNI del prestamista
                    ->getSearchResultsUsing(function (string $search) {
                        return \App\Models\Prestamo::query()
                            ->where('id', 'like', "%{$search}%")
                            ->orWhereHas('prestamista', function ($q) use ($search) {
                                $q->where('dni', 'like', "%{$search}%");
                            })
                            ->get()
                            ->mapWithKeys(fn($record) => [
                                $record->id => 'Código: ' . $record->id . ' | ' .
                                    $record->producto->nombre . ' (' . $record->cantidad . ')' .
                                    ' | ' . $record->prestamista->dni .
                                    ' (' . $record->prestamista->primer_nombre . ' ' . $record->prestamista->primer_apellido . ')'
                            ]);
                    })
                    ->preload()
                    ->required(),
                TextInput::make('cantidad_devuelta')
                    ->required()
                    ->numeric(),
                TextInput::make('cantidad_mal_estado')
                    ->required()
                    ->numeric(),
                DatePicker::make('fecha_devolucion')
                    ->required(),
                Textarea::make('descripcion')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
