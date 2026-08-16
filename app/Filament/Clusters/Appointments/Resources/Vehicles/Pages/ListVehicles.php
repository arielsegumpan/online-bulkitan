<?php

namespace App\Filament\Clusters\Appointments\Resources\Vehicles\Pages;

use App\Filament\Clusters\Appointments\Resources\Vehicles\VehicleResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVehicles extends ListRecords
{
    protected static string $resource = VehicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->icon(Iconoir::Plus)->label('New Vehicle'),
        ];
    }
}
