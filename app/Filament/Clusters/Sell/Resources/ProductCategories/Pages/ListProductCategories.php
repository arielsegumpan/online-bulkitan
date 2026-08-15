<?php

namespace App\Filament\Clusters\Sell\Resources\ProductCategories\Pages;

use App\Filament\Clusters\Sell\Resources\ProductCategories\ProductCategoryResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductCategories extends ListRecords
{
    protected static string $resource = ProductCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->icon(Iconoir::Plus)->label('New Category'),
        ];
    }
}
