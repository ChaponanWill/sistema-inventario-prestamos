<?php

namespace App\Filament\Resources\Devolucions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DevolucionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('prestamo.id')
                    ->label('Código Prestamo')
                    ->searchable(),
                TextColumn::make('cantidad_devuelta')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cantidad_mal_estado')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('fecha_devolucion')
                    ->label('Fecha Devolución')
                    // dmy
                    ->date('d/m/Y')
                    ->sortable(),
                // DNI prestamista
                TextColumn::make('prestamo.prestamista.dni')
                    ->label('DNI Prestamista')
                    ->searchable(),
                // primer nombre prestamista y primer apellido prestamista
                TextColumn::make('prestamo.prestamista.primer_nombre')
                    ->label('Nombre')
                    ->searchable(),
                TextColumn::make('prestamo.prestamista.primer_apellido')
                    ->label('Apellido')
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
