<?php

namespace App\Filament\Clusters\Appointments\Resources\ServiceCategories;

use App\Filament\Clusters\Appointments\AppointmentsCluster;
use App\Filament\Clusters\Appointments\Resources\ServiceCategories\Pages\CreateServiceCategory;
use App\Filament\Clusters\Appointments\Resources\ServiceCategories\Pages\EditServiceCategory;
use App\Filament\Clusters\Appointments\Resources\ServiceCategories\Pages\ListServiceCategories;
use App\Filament\Clusters\Appointments\Resources\ServiceCategories\Pages\ViewServiceCategory;
use App\Filament\Clusters\Appointments\Resources\ServiceCategories\Schemas\ServiceCategoryForm;
use App\Filament\Clusters\Appointments\Resources\ServiceCategories\Schemas\ServiceCategoryInfolist;
use App\Filament\Clusters\Appointments\Resources\ServiceCategories\Tables\ServiceCategoriesTable;
use App\Models\ServiceCategory;
use BackedEnum;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceCategoryResource extends Resource
{
    protected static ?string $model = ServiceCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Iconoir::Folder;

    protected static ?string $cluster = AppointmentsCluster::class;

    protected static ?string $recordTitleAttribute = 'service_name';

    protected static ?string $navigationLabel = 'Categories';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ServiceCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ServiceCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceCategories::route('/'),
            'create' => CreateServiceCategory::route('/create'),
            'view' => ViewServiceCategory::route('/{record}'),
            'edit' => EditServiceCategory::route('/{record}/edit'),
        ];
    }
}
