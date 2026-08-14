<?php

namespace App\Filament\Clusters\Appointments\Resources\Services\Pages;

use App\Filament\Clusters\Appointments\Resources\Services\ServiceResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServices extends ListRecords
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->icon(Iconoir::Plus)->label('New Service'),
        ];
    }
}
