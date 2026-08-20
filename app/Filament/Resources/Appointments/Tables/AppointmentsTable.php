<?php

namespace App\Filament\Resources\Appointments\Tables;

use App\Filament\Resources\Appointments\AppointmentResource;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AppointmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('appointment_number')
                    ->searchable(),

                TextColumn::make('customer.name')
                    ->searchable(),

                TextColumn::make('vehicle.id')
                    ->searchable(),

                TextColumn::make('employee.name')
                    ->searchable(),
                
                TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('end_time')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_by')
                    ->numeric()
                    ->sortable()
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
                    ->label('New Appointment')
                    ->url(
                        AppointmentResource::getUrl('create'))
                    ->icon(Iconoir::Plus)
                    ->button()
                    ->visible(fn (): bool => auth()->user()->can('create', AppointmentResource::class)),
            ])
            ->emptyStateIcon(Iconoir::CalendarCheck)
            ->emptyStateHeading('No appointments are created');
    }
}
