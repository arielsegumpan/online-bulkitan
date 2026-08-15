<?php

namespace App\Filament\Clusters\Sell\Resources\Brands;

use App\Filament\Clusters\Sell\Resources\Brands\Pages\CreateBrand;
use App\Filament\Clusters\Sell\Resources\Brands\Pages\EditBrand;
use App\Filament\Clusters\Sell\Resources\Brands\Pages\ListBrands;
use App\Filament\Clusters\Sell\Resources\Brands\Pages\ViewBrand;
use App\Filament\Clusters\Sell\Resources\Brands\Schemas\BrandForm;
use App\Filament\Clusters\Sell\Resources\Brands\Schemas\BrandInfolist;
use App\Filament\Clusters\Sell\Resources\Brands\Tables\BrandsTable;
use App\Filament\Clusters\Sell\SellCluster;
use App\Models\Brand;
use BackedEnum;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static string|BackedEnum|null $navigationIcon = Iconoir::BadgeCheck;

    protected static ?string $cluster = SellCluster::class;

    protected static ?string $recordTitleAttribute = 'brand_name';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function form(Schema $schema): Schema
    {
        return BrandForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BrandInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BrandsTable::configure($table);
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
            'index' => ListBrands::route('/'),
            'create' => CreateBrand::route('/create'),
            'view' => ViewBrand::route('/{record}'),
            'edit' => EditBrand::route('/{record}/edit'),
        ];
    }
}
