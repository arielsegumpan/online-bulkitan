<?php

namespace App\Filament\Clusters\Appointments\Resources\Vehicles\Pages;

use App\Filament\Clusters\Appointments\Resources\Vehicles\VehicleResource;
use App\Models\Vehicle;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditVehicle extends EditRecord
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
            ViewAction::make()->icon(Iconoir::Eye),
            DeleteAction::make()->icon(Iconoir::Trash),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }
}
