<?php

namespace App\Filament\Resources\Productos\RelationManagers;

use App\Filament\Resources\Prestamos\PrestamoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class PrestamosRelationManager extends RelationManager
{
    protected static string $relationship = 'prestamos';

    protected static ?string $relatedResource = PrestamoResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
