<?php

namespace App\Filament\Clusters\Sell\Resources\ProductCategories;

use App\Filament\Clusters\Sell\Resources\ProductCategories\Pages\CreateProductCategory;
use App\Filament\Clusters\Sell\Resources\ProductCategories\Pages\EditProductCategory;
use App\Filament\Clusters\Sell\Resources\ProductCategories\Pages\ListProductCategories;
use App\Filament\Clusters\Sell\Resources\ProductCategories\Pages\ViewProductCategory;
use App\Filament\Clusters\Sell\Resources\ProductCategories\Schemas\ProductCategoryForm;
use App\Filament\Clusters\Sell\Resources\ProductCategories\Schemas\ProductCategoryInfolist;
use App\Filament\Clusters\Sell\Resources\ProductCategories\Tables\ProductCategoriesTable;
use App\Filament\Clusters\Sell\SellCluster;
use App\Models\ProductCategory;
use BackedEnum;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Iconoir::MenuScale;

    protected static ?string $cluster = SellCluster::class;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ProductCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProductCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductCategoriesTable::configure($table);
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
            'index' => ListProductCategories::route('/'),
            'create' => CreateProductCategory::route('/create'),
            'view' => ViewProductCategory::route('/{record}'),
            'edit' => EditProductCategory::route('/{record}/edit'),
        ];
    }
}
