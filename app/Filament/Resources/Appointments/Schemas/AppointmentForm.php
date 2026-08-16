<?php

namespace App\Filament\Resources\Appointments\Schemas;

use App\Enums\AppointmentStatusEnums;
use App\Models\Service;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
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
                Group::make([
                    Select::make('service_id')
                        ->relationship(name: 'service', titleAttribute: 'service_name')
                        ->native(false)
                        ->searchable()
                        ->optionsLimit(5)
                        ->preload()
                        ->required()
                        ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                        ->live()
                        ->afterStateUpdated(function (?string $state, Set $set) {
                            if (blank($state)) {
                                $set('price', 0);

                                return;
                            }

                            $service = Service::find($state);
                            $set('price', $service?->service_price ?? 0);
                        }),

                    TextInput::make('price')
                        ->default(0)
                        ->numeric()
                        ->prefix('₱')
                        ->required()
                        ->disabled()
                        ->dehydrated(),
                ])
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                ]),
            ])
            ->addActionLabel('Add more services')
            ->extraItemActions([
            Action::make('viewService')
                ->label('View')
                ->icon(Iconoir::Eye)
                ->iconButton()
                ->visible(function (array $arguments, Repeater $component): bool {
                    $itemData = $component->getRawItemState($arguments['item']);

                    return ! blank($itemData['service_id'] ?? null);
                })
                ->modalHeading('Service Details')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close')
                ->record(function (array $arguments, Repeater $component): ?Service {
                    $itemData = $component->getRawItemState($arguments['item']);
                    $serviceId = $itemData['service_id'] ?? null;

                    if (blank($serviceId)) {
                        return null;
                    }

                    return static::getCachedService($serviceId);
                })
                ->infolist([
                    Grid::make([
                        'default' => 1,
                        'md' => 2,
                    ])
                        ->schema([
                            TextEntry::make('service_name')
                                ->label('Name')
                                ->weight('bold')
                                ->columnSpanFull(),

                            TextEntry::make('service_duration_minutes')
                                ->label('Duration')
                                ->formatStateUsing(fn (?int $state) => $state >= 60
                                    ? floor($state / 60).' hrs '.($state % 60 > 0 ? ($state % 60).' mins' : '')
                                    : ($state ?? 0).' mins'
                                ),

                            TextEntry::make('service_price')
                                ->label('Price')
                                ->money('PHP'),

                            TextEntry::make('service_desc')
                                ->label('Description')
                                ->columnSpanFull()
                                ->markdown(),
                        ]),
                ]),
        ])
            ->itemLabel(function (array $state): ?string {
                $serviceId = $state['service_id'] ?? null;

                if (blank($serviceId)) {
                    return 'New Service';
                }

                $service = static::getCachedService($serviceId);

                return $service?->service_name ?? 'Unknown Service';
            })
            ->orderColumn('sort')
            ->defaultItems(1)
            ->hiddenLabel()
            ->required();
    }

    /**
     * Memoizes Service lookups within a single request so repeated
     * lookups for the same service_id across itemLabel()/record() calls
     * don't trigger duplicate queries.
     */
    protected static function getCachedService(int|string $serviceId): ?Service
    {
        static $cache = [];

        return $cache[$serviceId] ??= Service::find($serviceId);
    }
}
