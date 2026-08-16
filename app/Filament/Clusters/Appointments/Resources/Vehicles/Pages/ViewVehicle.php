<?php

namespace App\Filament\Clusters\Appointments\Resources\Vehicles\Pages;

use App\Filament\Clusters\Appointments\Resources\Vehicles\VehicleResource;
use App\Models\Vehicle;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewVehicle extends ViewRecord
{
    protected static string $resource = VehicleResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var Vehicle */
        $record = $this->getRecord();
        return 'Edit ' . $record->plate_number;
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()->icon(Iconoir::EditPencil),
        ];
    }
}
