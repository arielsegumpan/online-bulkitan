<?php

namespace App\Filament\Clusters\Appointments\Resources\ServiceCategories\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceCategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    Section::make()
                        ->schema([
                            TextEntry::make('name'),
                            TextEntry::make('description')
                                ->placeholder('-')
                                ->columnSpanFull(),
                        ])
                        ->columnSpan([
                            'default' => 1,
                            'sm' => 1,
                            'md' => 3,
                            'lg' => 3,
                        ]),

                    Section::make()
                        ->schema([
                            TextEntry::make('created_at')
                                ->dateTime('M j, Y g:i A')
                                ->placeholder('-'),
                            TextEntry::make('updated_at')
                                ->dateTime('M j, Y g:i A')
                                ->placeholder('-'),
                        ])
                        ->columnSpan([
                            'default' => 1,
                            'sm' => 1,
                            'md' => 2,
                            'lg' => 2,
                        ]),
                ])
                    ->columnSpanFull()
                    ->columns([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 5,
                        'lg' => 5,
                    ]),
            ]);
    }
}
