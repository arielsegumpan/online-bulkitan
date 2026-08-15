<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->icon(Iconoir::Plus)->label('New Product'),
        ];
    }
}
