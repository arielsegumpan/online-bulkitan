<?php

namespace App\Filament\Clusters\Sell\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Group::make([
                            TextInput::make('brand_name')
                                ->label('Name')
                                ->required()
                                ->trim()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('brand_slug', Str::slug($state))),
                            
                            TextInput::make('brand_slug')
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
                            ]),

                        Textarea::make('description')
                            ->default(null)
                            ->columnSpanFull()
                            ->maxlength(500),
                    ])
                    ->columnSpan([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 3,
                        'lg' => 3,
                    ]),

                Section::make()
                    ->schema([
                        FileUpload::make('brand_img')
                            ->label('Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('brands')
                            ->visibility('public')
                            ->required(),
                    ])
                    ->columnSpan([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ]),
            ])
            ->columns([
                'default' => 1,
                'sm' => 1,
                'md' => 5,
                'lg' => 5,
            ]);
    }
}
