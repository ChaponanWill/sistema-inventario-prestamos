<?php

namespace App\Filament\Resources\Prestamistas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class PrestamistaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('dni')
                    ->required(),
                TextInput::make('primer_nombre')
                    ->required(),
                TextInput::make('segundo_nombre')
                    ->default(null),
                TextInput::make('primer_apellido')
                    ->required(),
                TextInput::make('segundo_apellido')
                    ->required(),
                Toggle::make('estado')
                    ->default(1)
                    ->required(),
                Select::make('area_id')
                    ->relationship('area', 'nombre', fn(Builder $query, $get)=> 
                        $query->where('estado',1)->orWhere('id',($get('area_id')))
                    )
                    ->required(),
            ]);
    }
}
