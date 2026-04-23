<?php

namespace App\Filament\Resources\Prestamistas\Pages;

use App\Filament\Resources\Prestamistas\PrestamistaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPrestamista extends ViewRecord
{
    protected static string $resource = PrestamistaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
