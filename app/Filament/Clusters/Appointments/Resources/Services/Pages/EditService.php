<?php

namespace App\Filament\Clusters\Appointments\Resources\Services\Pages;

use App\Filament\Clusters\Appointments\Resources\Services\ServiceResource;
use App\Models\Service;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var Service */
        $record = $this->getRecord();
        return 'Edit ' . $record->appointment_number;
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
