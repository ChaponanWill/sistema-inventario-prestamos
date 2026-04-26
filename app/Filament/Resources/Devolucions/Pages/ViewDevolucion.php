<?php

namespace App\Filament\Resources\Devolucions\Pages;

use App\Filament\Resources\Devolucions\DevolucionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDevolucion extends ViewRecord
{
    protected static string $resource = DevolucionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
