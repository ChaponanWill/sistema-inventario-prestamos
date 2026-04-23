<?php

namespace App\Filament\Resources\Prestamistas\Pages;

use App\Filament\Resources\Prestamistas\PrestamistaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPrestamista extends EditRecord
{
    protected static string $resource = PrestamistaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
