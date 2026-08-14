<?php

namespace App\Filament\Clusters\Appointments\Resources\Services;

use App\Filament\Clusters\Appointments\AppointmentsCluster;
use App\Filament\Clusters\Appointments\Resources\Services\Pages\CreateService;
use App\Filament\Clusters\Appointments\Resources\Services\Pages\EditService;
use App\Filament\Clusters\Appointments\Resources\Services\Pages\ListServices;
use App\Filament\Clusters\Appointments\Resources\Services\Pages\ViewService;
use App\Filament\Clusters\Appointments\Resources\Services\Schemas\ServiceForm;
use App\Filament\Clusters\Appointments\Resources\Services\Schemas\ServiceInfolist;
use App\Filament\Clusters\Appointments\Resources\Services\Tables\ServicesTable;
use App\Models\Service;
use BackedEnum;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|BackedEnum|null $navigationIcon = Iconoir::Tools;

    protected static ?string $cluster = AppointmentsCluster::class;

    protected static ?string $recordTitleAttribute = 'service_name';

    protected static ?int $navigationSort = 0;

    public static function form(Schema $schema): Schema
    {
        return ServiceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ServiceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServicesTable::configure($table);
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
            'index' => ListServices::route('/'),
            'create' => CreateService::route('/create'),
            'view' => ViewService::route('/{record}'),
            'edit' => EditService::route('/{record}/edit'),
        ];
    }
}
