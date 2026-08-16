<?php

namespace App\Filament\Clusters\Appointments\Resources\Services\Schemas;

use App\Models\ServiceCategory;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Facades\Filament;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Service Details')
                    ->icon(Iconoir::Tools)
                    ->description('Manage your services.')
                    ->schema([
                        TextInput::make('service_name')
                            ->label('Name')
                            ->required()
                            ->maxlength(255),

                        Select::make('service_category_id')
                            ->label('Category')
                            ->relationship(
                                name: 'serviceCategory',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn (Builder $query) => $query->where('shop_id', Filament::getTenant()->id),
                            )
                            ->required()
                            ->native(false)
                            ->preload()
                            ->optionsLimit(5)
                            ->searchable(['name'])
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),
                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])
                            ->createOptionModalHeading('Create Category')
                            ->createOptionUsing(function (array $data): int {
                                $data['shop_id'] = Filament::getTenant()->id;
                                $data['slug'] = Str::of($data['name'])->slug()->lower();

                                return ServiceCategory::create($data)->getKey();
                            })
                            ->updateOptionUsing(function (array $data, Schema $schema) {
                                $schema->getRecord()?->update($data);
                            }),
                            
                        TextInput::make('service_duration_minutes')
                            ->label('Duration')
                            ->required()
                            ->numeric()
                            ->prefixIcon(Iconoir::Clock)
                            ->suffix('hrs'),

                        TextInput::make('service_price')
                            ->label('Price')
                            ->required()
                            ->numeric()
                            ->prefix('₱'),

                        ToggleButtons::make('is_mobile_service')
                            ->label('Is Mobile Service?')
                            ->required()
                            ->default(false)
                            ->dehydrated()
                            ->inline()
                            ->boolean(),

                        ToggleButtons::make('is_active')
                            ->label('Is Active?')
                            ->required()
                            ->default(true)
                            ->dehydrated()
                            ->inline()
                            ->boolean(),

                        RichEditor::make('service_desc')
                            ->label('Description')
                            ->default(null)
                            ->columnSpanFull(),
                    ])
                    ->columns([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ])
                    ->columnspanfUll(),
            ]);
    }
}
