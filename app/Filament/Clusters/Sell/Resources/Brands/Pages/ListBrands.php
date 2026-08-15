<?php

namespace App\Filament\Clusters\Sell\Resources\Brands\Pages;

use App\Filament\Clusters\Sell\Resources\Brands\BrandResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBrands extends ListRecords
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->icon(Iconoir::Plus)->label('New Brand'),
        ];
    }
}
