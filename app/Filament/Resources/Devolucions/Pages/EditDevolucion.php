<?php

namespace App\Filament\Resources\Devolucions\Pages;

use App\Filament\Resources\Devolucions\DevolucionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDevolucion extends EditRecord
{
    protected static string $resource = DevolucionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
