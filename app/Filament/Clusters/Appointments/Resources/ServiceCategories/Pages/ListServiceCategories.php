<?php

namespace App\Filament\Clusters\Appointments\Resources\ServiceCategories\Pages;

use App\Filament\Clusters\Appointments\Resources\ServiceCategories\ServiceCategoryResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceCategories extends ListRecords
{
    protected static string $resource = ServiceCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->icon(Iconoir::Plus)->label('New Category'),
        ];
    }
}
