<?php

namespace App\Filament\Clusters\Sell\Resources\Brands\Pages;

use App\Filament\Clusters\Sell\Resources\Brands\BrandResource;
use App\Models\Brand;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class EditBrand extends EditRecord
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
        $data['brand_name'] = Str::of($data['brand_name'])->title();
        return $data;
    }
}
