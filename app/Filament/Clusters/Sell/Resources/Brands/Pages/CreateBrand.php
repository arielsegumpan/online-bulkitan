<?php

namespace App\Filament\Clusters\Sell\Resources\Brands\Pages;

use App\Filament\Clusters\Sell\Resources\Brands\BrandResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['brand_name'] = Str::of($data['brand_name'])->title();
        return $data;
    }
}
