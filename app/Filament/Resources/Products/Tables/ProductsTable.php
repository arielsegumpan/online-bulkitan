<?php

namespace App\Filament\Resources\Products\Tables;

use App\Filament\Resources\Products\ProductResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                ImageColumn::make('ft_img'),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('category.name')
                    ->searchable(),

                TextColumn::make('barcode')
                    ->searchable(),
                TextColumn::make('brand')
                    ->searchable(),
                TextColumn::make('cost_price')
                    ->money()
                    ->sortable(),
                TextColumn::make('selling_price')
                    ->money()
                    ->sortable(),
                TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('low_stock_alert')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('attachments')
                    ->imageHeight(40)
                    ->stacked(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make(),
                ])
                    ->icon(Iconoir::MoreVertCircle),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', direction: 'desc')
            ->deferLoading()
            ->emptyStateActions([
                Action::make('create')
                    ->label('New Product')
                    ->url(
                        ProductResource::getUrl('create'))
                    ->icon(Iconoir::Plus)
                    ->button(),
            ])
            ->emptyStateIcon(Iconoir::UnderlineSquare)
            ->emptyStateHeading('No products are created');
    }
}
