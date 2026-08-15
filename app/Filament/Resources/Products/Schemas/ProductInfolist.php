<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    Section::make()
                        ->schema([
                            TextEntry::make('name')
                                ->weight('bold'),

                            TextEntry::make('sku')
                                ->label('SKU')
                                ->badge()
                                ->color('warning'),

                            TextEntry::make('category.name')
                                ->label('Category')
                                ->badge()
                                ->color('primary'),

                            TextEntry::make('barcode')
                                ->placeholder('-'),

                            TextEntry::make('cost_price')
                                ->money('PHP'),

                            TextEntry::make('selling_price')
                                ->money('PHP'),

                            TextEntry::make('stock')
                                ->numeric(),

                            TextEntry::make('low_stock_alert')
                                ->numeric(),

                        ])
                        ->columns([
                            'default' => 1,
                            'sm' => 1,
                            'md' => 2,
                            'lg' => 2,
                        ])
                        ->columnSpanFull(),

                    Section::make()
                        ->schema([
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
                        ->columnSpanFull(),

                ])
                    ->columnSpan([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 4,
                        'lg' => 4,
                    ]),
                Group::make([
                    Section::make()
                        ->schema([
                            ImageEntry::make('ft_img')
                                ->disk('public')
                                ->visibility('public')
                                ->hiddenLabel()
                                ->imageWidth('100%')
                                ->imageHeight('auto'),
                        ]),
                    ImageEntry::make('brand.brand_img')
                        ->label('Brand')
                        ->placeholder('-')
                        ->disk('public')
                        ->visibility('public')
                        ->imageSize(70)
                        ->toolTip(fn (Product $record): string => $record->brand->brand_name),

                ])
                    ->columnSpan([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 1,
                        'lg' => 1,
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
