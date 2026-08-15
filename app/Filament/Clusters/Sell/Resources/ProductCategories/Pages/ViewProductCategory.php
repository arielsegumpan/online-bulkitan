<?php

namespace App\Filament\Clusters\Sell\Resources\ProductCategories\Pages;

use App\Filament\Clusters\Sell\Resources\ProductCategories\ProductCategoryResource;
use App\Models\ProductCategory;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewProductCategory extends ViewRecord
{
    protected static string $resource = ProductCategoryResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var ProductCategory */
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
