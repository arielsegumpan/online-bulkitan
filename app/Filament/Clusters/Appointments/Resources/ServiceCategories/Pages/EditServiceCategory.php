<?php

namespace App\Filament\Clusters\Appointments\Resources\ServiceCategories\Pages;

use App\Filament\Clusters\Appointments\Resources\ServiceCategories\ServiceCategoryResource;
use App\Models\ServiceCategory;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditServiceCategory extends EditRecord
{
    protected static string $resource = ServiceCategoryResource::class;

     public function getTitle(): string | Htmlable
    {
        /** @var ServiceCategory */
        $record = $this->getRecord();
        return 'Edit ' . $record->name;
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
