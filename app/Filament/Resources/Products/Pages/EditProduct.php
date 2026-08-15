<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use App\Models\Product;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var Product */
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
        return $data;
    }
}
