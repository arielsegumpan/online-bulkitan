<?php

namespace App\Filament\Clusters\Sell\Resources\Brands\Tables;

use App\Filament\Clusters\Sell\Resources\Brands\BrandResource;
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

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('brand_img')
                    ->label('Image')
                    ->imageHeight(50)
                    ->disk('public')
                    ->visibility('public'),
                TextColumn::make('brand_name')
                    ->label('Name')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('brand_slug')
                    ->label('Slug')
                    ->searchable(),
                TextColumn::make('brand_description')
                    ->label('Description')
                    ->searchable()
                    ->wrap(50)
                    ->limit(50),
                TextColumn::make('created_at')
                    ->dateTime('M d, Y g:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime('M d, Y g:i A')
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
                    ->label('New Brand')
                    ->url(
                        BrandResource::getUrl('create'))
                    ->icon(Iconoir::Plus)
                    ->button()
                     ->visible(fn (): bool => auth()->user()->can('create', BrandResource::class)),
            ])
            ->emptyStateIcon(Iconoir::BadgeCheck)
            ->emptyStateHeading('No brands are created');
    }
}
