<?php

namespace App\Filament\Clusters\Sell\Resources\ProductCategories\Schemas;

use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->icon(Iconoir::MenuScale)
                    ->aside()
                    ->description('Manage your product categories.')
                    ->schema([
                        Group::make([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->trim()
                                ->maxLength(255)
                                ->disabled()
                                ->dehydrated()
                                ->validationMessages([
                                    'required' => 'Please generate slug.',
                                    'unique' => 'This slug is already taken.',
                                ]),

                        ])
                            ->columns([
                                'default' => 1,
                                'sm' => 1,
                                'md' => 2,
                                'lg' => 2,
                            ]),
                        Textarea::make('description')
                            ->default(null)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
