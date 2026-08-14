<?php

namespace App\Filament\Clusters\Appointments\Resources\Services\Pages;

use App\Filament\Clusters\Appointments\Resources\Services\ServiceResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewService extends ViewRecord
{
    protected static string $resource = ServiceResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var Service */
        $record = $this->getRecord();
        return 'Edit ' . $record->service_name;
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()->icon(Iconoir::EditPencil),
        ];
    }
}
