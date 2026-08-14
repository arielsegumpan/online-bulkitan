<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AppointmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('shop.name')
                    ->label('Shop'),
                TextEntry::make('customer.name')
                    ->label('Customer'),
                TextEntry::make('vehicle.id')
                    ->label('Vehicle')
                    ->placeholder('-'),
                TextEntry::make('employee.name')
                    ->label('Employee')
                    ->placeholder('-'),
                TextEntry::make('appointment_number'),
                TextEntry::make('start_time')
                    ->dateTime(),
                TextEntry::make('end_time')
                    ->dateTime(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_by')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
