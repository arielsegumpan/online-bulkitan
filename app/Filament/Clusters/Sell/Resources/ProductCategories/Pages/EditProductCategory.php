<?php

namespace App\Filament\Clusters\Sell\Resources\ProductCategories\Pages;

use App\Filament\Clusters\Sell\Resources\ProductCategories\ProductCategoryResource;
use App\Models\ProductCategory;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class EditProductCategory extends EditRecord
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
        $data['name'] = Str::of($data['name'])->title();
        return $data;
    }
}
