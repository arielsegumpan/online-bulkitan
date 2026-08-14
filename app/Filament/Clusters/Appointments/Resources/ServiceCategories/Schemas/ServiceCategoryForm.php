<?php

namespace App\Filament\Clusters\Appointments\Resources\ServiceCategories\Schemas;

use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->icon(Iconoir::Folder)
                    ->description('Manage your service categories.')
                    ->aside()
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        Textarea::make('description')
                            ->default(null)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
