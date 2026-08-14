<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->description('Manage your appointments and schedules')
                    ->icon(Iconoir::CalendarCheck)
                    ->aside()
                    ->schema([
                        Select::make('shop_id')
                            ->relationship('shop', 'name')
                            ->required(),
                        Select::make('customer_id')
                            ->relationship('customer', 'name')
                            ->required(),
                        Select::make('vehicle_id')
                            ->relationship('vehicle', 'id')
                            ->default(null),
                        Select::make('employee_id')
                            ->relationship('employee', 'name')
                            ->default(null),
                        TextInput::make('appointment_number')
                            ->required(),
                        DateTimePicker::make('start_time')
                            ->required(),
                        DateTimePicker::make('end_time')
                            ->required(),
                        Select::make('status')
                            ->options([
                                'scheduled' => 'Scheduled',
                                'in_progress' => 'In progress',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('scheduled')
                            ->required(),
                        Textarea::make('notes')
                            ->default(null)
                            ->columnSpanFull(),
                        TextInput::make('created_by')
                            ->numeric()
                            ->default(null),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
