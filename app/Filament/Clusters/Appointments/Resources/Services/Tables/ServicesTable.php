<?php

namespace App\Filament\Clusters\Appointments\Resources\Services\Tables;

use App\Filament\Clusters\Appointments\Resources\Services\ServiceResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service_name')
                    ->searchable()
                    ->label('Service'),

                TextColumn::make('serviceCategory.name')
                    ->label('Category')
                    ->searchable(),

                TextColumn::make('service_duration_minutes')
                    ->label('Duration (Minutes)')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('service_price')
                    ->label('Price')
                    ->money('PHP')
                    ->sortable(),

                IconColumn::make('is_mobile_service')
                    ->label('Mobile Service')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

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
                    ->label('New Service')
                    ->url(
                        ServiceResource::getUrl('create'))
                    ->icon(Iconoir::Plus)
                    ->button(),
            ])
            ->emptyStateIcon(Iconoir::Tools)
            ->emptyStateHeading('No services are created');
    }
}
