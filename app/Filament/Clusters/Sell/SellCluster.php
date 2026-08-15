<?php

namespace App\Filament\Clusters\Sell;

use BackedEnum;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Clusters\Cluster;
use Filament\Pages\Enums\SubNavigationPosition;

class SellCluster extends Cluster
{
     protected static string|BackedEnum|null $navigationIcon = Iconoir::UnderlineSquare;

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
