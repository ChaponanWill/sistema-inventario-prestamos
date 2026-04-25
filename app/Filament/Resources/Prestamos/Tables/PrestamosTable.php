<?php

namespace App\Filament\Resources\Prestamos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PrestamosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fecha_prestamo')
                    ->date()
                    ->sortable(),
                TextColumn::make('producto.nombre')
                    ->searchable(),
                TextColumn::make('cantidad')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('fecha_devolucion')
                    ->date()
                    ->sortable(),
                //  Combinar el DNI + primer nombre y apellido del prestamista
                TextColumn::make('prestamista.dni')
                    ->getStateUsing(function ($record) {
                        return $record->prestamista->dni . ' - ' . $record->prestamista->primer_nombre . ' ' . $record->prestamista->primer_apellido;
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
