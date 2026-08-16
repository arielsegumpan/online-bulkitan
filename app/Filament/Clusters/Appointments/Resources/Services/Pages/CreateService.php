<?php

namespace App\Filament\Clusters\Appointments\Resources\Services\Pages;

use App\Filament\Clusters\Appointments\Resources\Services\ServiceResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['service_name'] = Str::of($data['service_name'])->title();
        return $data;
    }
}
