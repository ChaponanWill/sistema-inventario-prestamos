<?php

namespace App\Filament\Resources\Prestamistas\Pages;

use App\Filament\Resources\Prestamistas\PrestamistaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPrestamistas extends ListRecords
{
    protected static string $resource = PrestamistaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
