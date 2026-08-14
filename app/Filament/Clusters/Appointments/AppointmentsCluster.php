<?php

namespace App\Filament\Clusters\Appointments;

use BackedEnum;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Clusters\Cluster;
use Filament\Pages\Enums\SubNavigationPosition;

class AppointmentsCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = Iconoir::CalendarCheck;

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
}
