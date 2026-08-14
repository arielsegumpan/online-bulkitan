<?php

namespace App\Filament\Clusters\Appointments\Resources\Services\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ServiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('shop.name')
                    ->label('Shop'),
                TextEntry::make('serviceCategory.name')
                    ->label('Service category'),
                TextEntry::make('service_name'),
                TextEntry::make('service_desc')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('service_duration_minutes')
                    ->numeric(),
                TextEntry::make('service_price')
                    ->money(),
                IconEntry::make('is_mobile_service')
                    ->boolean(),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
