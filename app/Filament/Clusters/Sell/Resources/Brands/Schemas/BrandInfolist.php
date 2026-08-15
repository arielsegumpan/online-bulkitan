<?php

namespace App\Filament\Clusters\Sell\Resources\Brands\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('brand_name')
                            ->label('Name')
                            ->weight('bold'),
                        TextEntry::make('brand_slug')
                            ->label('Slug')
                            ->placeholder('-'),
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->dateTime('M d, Y g:i A')
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime('M d, Y g:i A')
                            ->placeholder('-'),
                    ])
                    ->columns([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ])
                    ->columnSpan([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 3,
                        'lg' => 3,
                    ]),

                Section::make()
                    ->schema([
                        ImageEntry::make('brand_img')
                            ->hiddenLabel()
                            ->disk('public')
                            ->visibility('public')
                            ->imageWidth('100%')
                            ->imageHeight(200),
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
