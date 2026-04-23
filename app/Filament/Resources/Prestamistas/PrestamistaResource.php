<?php

namespace App\Filament\Resources\Prestamistas;

use App\Filament\Resources\Prestamistas\Pages\CreatePrestamista;
use App\Filament\Resources\Prestamistas\Pages\EditPrestamista;
use App\Filament\Resources\Prestamistas\Pages\ListPrestamistas;
use App\Filament\Resources\Prestamistas\Pages\ViewPrestamista;
use App\Filament\Resources\Prestamistas\Schemas\PrestamistaForm;
use App\Filament\Resources\Prestamistas\Schemas\PrestamistaInfolist;
use App\Filament\Resources\Prestamistas\Tables\PrestamistasTable;
use App\Models\Prestamista;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PrestamistaResource extends Resource
{
    protected static ?string $model = Prestamista::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'dni';

    public static function form(Schema $schema): Schema
    {
        return PrestamistaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PrestamistaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrestamistasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPrestamistas::route('/'),
            'create' => CreatePrestamista::route('/create'),
            'view' => ViewPrestamista::route('/{record}'),
            'edit' => EditPrestamista::route('/{record}/edit'),
        ];
    }
}
