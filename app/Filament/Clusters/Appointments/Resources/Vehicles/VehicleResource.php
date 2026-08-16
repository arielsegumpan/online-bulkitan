<?php

namespace App\Filament\Clusters\Appointments\Resources\Vehicles;

use App\Filament\Clusters\Appointments\AppointmentsCluster;
use App\Filament\Clusters\Appointments\Resources\Vehicles\Pages\CreateVehicle;
use App\Filament\Clusters\Appointments\Resources\Vehicles\Pages\EditVehicle;
use App\Filament\Clusters\Appointments\Resources\Vehicles\Pages\ListVehicles;
use App\Filament\Clusters\Appointments\Resources\Vehicles\Pages\ViewVehicle;
use App\Filament\Clusters\Appointments\Resources\Vehicles\Schemas\VehicleForm;
use App\Filament\Clusters\Appointments\Resources\Vehicles\Schemas\VehicleInfolist;
use App\Filament\Clusters\Appointments\Resources\Vehicles\Tables\VehiclesTable;
use App\Models\Vehicle;
use BackedEnum;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static string|BackedEnum|null $navigationIcon = Iconoir::DeliveryTruck;

    protected static ?string $cluster = AppointmentsCluster::class;

    protected static ?string $recordTitleAttribute = 'plate_number';

    public static function form(Schema $schema): Schema
    {
        return VehicleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VehicleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VehiclesTable::configure($table);
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
            'index' => ListVehicles::route('/'),
            'create' => CreateVehicle::route('/create'),
            'view' => ViewVehicle::route('/{record}'),
            'edit' => EditVehicle::route('/{record}/edit'),
        ];
    }
}
