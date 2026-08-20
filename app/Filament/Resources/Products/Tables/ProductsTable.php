<?php

namespace App\Filament\Resources\Products\Tables;

use App\Filament\Resources\Products\ProductResource;
use App\Models\Product;
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
                    ->searchable()
                    ->badge()
                    ->color('primary'),

                ImageColumn::make('ft_img')
                    ->imageHeight(50)
                    ->label('Image')
                    ->disk('public')
                    ->visibility('public'),

                TextColumn::make('name')
                    ->searchable()
                    ->description(fn (Product $record): string => $record->brand->brand_name),

                TextColumn::make('category.name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('barcode')
                    ->searchable()
                    ->placeholder('No Barcode'),

                TextColumn::make('cost_price')
                    ->money('PHP')
                    ->sortable(),

                TextColumn::make('selling_price')
                    ->money('PHP')
                    ->sortable(),

                TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('low_stock_alert')
                    ->numeric()
                    ->sortable(),

                ImageColumn::make('attachments.image')
                    ->imageHeight(40)
                    ->stacked()
                    ->toggleable(isToggledHiddenByDefault: true),

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
                    ->button()
                     ->visible(fn (): bool => auth()->user()->can('create', ProductResource::class)),
            ])
            ->emptyStateIcon(Iconoir::UnderlineSquare)
            ->emptyStateHeading('No products are created');
    }
}
