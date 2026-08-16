<?php

namespace App\Filament\Resources\Appointments\Schemas;

use App\Enums\AppointmentStatusEnums;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Appointment Information')
                    ->schema(
                        static::getDetailsComponents()
                    )
                    ->columns([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ]),

                Section::make('Select Services')
                    ->schema([
                        static::getItemsRepeater(),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    /**
     * @return array<Component>
     */
    public static function getDetailsComponents(): array
    {
        return [
            TextInput::make('appointment_number')
                ->label('Appointment #')
                ->required()
                ->default(fn () => 'APMNT-'.strtoupper(Str::random(6)))
                ->disabled()
                ->dehydrated() // ensures the value is still saved even though the field is disabled
                ->unique(ignoreRecord: true),

            Select::make('customer_id')
                ->relationship(
                    name: 'customer',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn (Builder $query) => $query
                        ->whereHas('shops', fn (Builder $query) => $query->where('shops.id', Filament::getTenant()->id))
                        ->role('customer'),
                )
                ->required()
                ->native(false)
                ->searchable()
                ->optionsLimit(5)
                ->preload(),

            Select::make('vehicle_id')
                ->required()
                ->relationship(
                    name: 'vehicle',
                    titleAttribute: 'plate_number',
                    modifyQueryUsing: fn (Builder $query) => $query->orderBy('created_at'),
                )
                ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->vehicle_type} {$record->plate_number}")
                ->native(false)
                ->searchable()
                ->optionsLimit(5)
                ->searchable(['vehicle_type', 'plate_number']),

            Select::make('employee_id')
                ->label('Assign Staff')
                ->required()
                ->relationship(name: 'employee', titleAttribute: 'name')
                ->native(false)
                ->searchable()
                ->optionsLimit(5)
                ->preload(),

            Group::make([
                DateTimePicker::make('start_time')
                    ->prefixIcon(Iconoir::Clock)
                    ->required()
                    ->default(now()),
                DateTimePicker::make('end_time')
                    ->prefixIcon(Iconoir::Clock)
                    ->required(),
            ])
                ->columnSpanFull()
                ->columns([
                    'default' => 1,
                    'sm' => 1,
                    'md' => 2,
                    'lg' => 2,
                ]),

            ToggleButtons::make('status')
                ->options(AppointmentStatusEnums::class)
                ->default(AppointmentStatusEnums::SCHEDULED)
                ->required()
                ->inline()
                ->dehydrated()
                ->columnSpanFull(),

            Textarea::make('notes')
                ->default(null)
                ->rows(4)
                ->columnSpanFull(),
        ];
    }

    public static function getItemsRepeater(): Repeater
    {
        return Repeater::make('appointmentServices')
            ->relationship('appointmentServices')
            ->schema([
                
            ])
            ->addActionLabel('Add more services')
            ->extraItemActions([
                // Action::make('openProduct')
                //     ->tooltip('Open product')
                //     ->icon(Heroicon::ArrowTopRightOnSquare)
                //     ->url(function (array $arguments, Repeater $component): ?string {
                //         $itemData = $component->getRawItemState($arguments['item']);

                //         $product = Product::find($itemData['product_id']);

                //         if (! $product) {
                //             return null;
                //         }

                //         return ProductResource::getUrl('edit', ['record' => $product]);
                //     }, shouldOpenInNewTab: true)
                //     ->hidden(fn (array $arguments, Repeater $component): bool => blank($component->getRawItemState($arguments['item'])['product_id'])),
            ])
            ->orderColumn('sort')
            ->defaultItems(1)
            ->hiddenLabel()
            ->required();
    }
}
