<?php

namespace App\Filament\Resources\Devolucions\Pages;

use App\Filament\Resources\Devolucions\DevolucionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDevolucions extends ListRecords
{
    protected static string $resource = DevolucionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
