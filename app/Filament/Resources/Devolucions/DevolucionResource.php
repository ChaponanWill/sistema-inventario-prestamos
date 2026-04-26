<?php

namespace App\Filament\Resources\Devolucions;

use App\Filament\Resources\Devolucions\Pages\CreateDevolucion;
use App\Filament\Resources\Devolucions\Pages\EditDevolucion;
use App\Filament\Resources\Devolucions\Pages\ListDevolucions;
use App\Filament\Resources\Devolucions\Pages\ViewDevolucion;
use App\Filament\Resources\Devolucions\Schemas\DevolucionForm;
use App\Filament\Resources\Devolucions\Schemas\DevolucionInfolist;
use App\Filament\Resources\Devolucions\Tables\DevolucionsTable;
use App\Models\Devolucion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DevolucionResource extends Resource
{
    protected static ?string $model = Devolucion::class;
    protected static ?string $navigationLabel = 'Devoluciones';
    protected static ?string $pluralLabel = 'Devoluciones';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowPath;

    public static function form(Schema $schema): Schema
    {
        return DevolucionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DevolucionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DevolucionsTable::configure($table);
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
            'index' => ListDevolucions::route('/'),
            'create' => CreateDevolucion::route('/create'),
            'view' => ViewDevolucion::route('/{record}'),
            'edit' => EditDevolucion::route('/{record}/edit'),
        ];
    }
}
