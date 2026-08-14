<?php

namespace App\Filament\Clusters\Appointments\Resources\ServiceCategories\Pages;

use App\Filament\Clusters\Appointments\Resources\ServiceCategories\ServiceCategoryResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewServiceCategory extends ViewRecord
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
            EditAction::make()->icon(Iconoir::EditPencil),
        ];
    }
}
