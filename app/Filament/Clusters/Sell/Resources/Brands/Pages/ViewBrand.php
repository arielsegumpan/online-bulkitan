<?php

namespace App\Filament\Clusters\Sell\Resources\Brands\Pages;

use App\Filament\Clusters\Sell\Resources\Brands\BrandResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewBrand extends ViewRecord
{
    protected static string $resource = BrandResource::class;

     public function getTitle(): string | Htmlable
    {
        /** @var Brand */
        $record = $this->getRecord();
        return 'Edit ' . $record->brand_name;
    }
    
    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()->icon(Iconoir::EditPencil),
        ];
    }
}
