<?php

namespace App\Filament\Clusters\Sell\Resources\ProductCategories\Pages;

use App\Filament\Clusters\Sell\Resources\ProductCategories\ProductCategoryResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['name'] = Str::of($data['name'])->title();
        return $data;
    }
}
