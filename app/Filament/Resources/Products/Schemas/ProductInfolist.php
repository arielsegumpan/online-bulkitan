<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('shop.name')
                    ->label('Shop'),
                TextEntry::make('category.name')
                    ->label('Category'),
                TextEntry::make('name'),
                TextEntry::make('sku')
                    ->label('SKU'),
                TextEntry::make('barcode')
                    ->placeholder('-'),
                TextEntry::make('brand')
                    ->placeholder('-'),
                TextEntry::make('cost_price')
                    ->money(),
                TextEntry::make('selling_price')
                    ->money(),
                TextEntry::make('stock')
                    ->numeric(),
                TextEntry::make('low_stock_alert')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
