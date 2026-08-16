<?php

namespace App\Filament\Clusters\Appointments\Resources\Vehicles\Schemas;

use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->icon(Iconoir::Car)
                    ->schema([
                        Select::make('customer_id')
                            ->relationship('customer', 'name')
                            ->required()
                            ->searchable()
                            ->native(false)
                            ->preload()
                            ->optionsLimit(5),
                        TextInput::make('plate_number')
                            ->default(null),
                        TextInput::make('vehicle_type')
                            ->required(),
                        TextInput::make('brand')
                            ->default(null),
                        TextInput::make('model')
                            ->default(null),
                        TextInput::make('year_model')
                            ->default(null),
                    ])
                    ->columns([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
