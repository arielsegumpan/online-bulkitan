<?php

namespace App\Filament\Resources\Appointments\Pages;

use App\Filament\Resources\Appointments\AppointmentResource;
use App\Models\Appointment;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditAppointment extends EditRecord
{
    protected static string $resource = AppointmentResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var Appointment */
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
