<?php

namespace App\Providers\Filament;

use App\Filament\Pages\EditShopProfile;
use App\Filament\Pages\RegisterShop;
use App\Http\Middleware\ApplyShopScopes;
use App\Http\Middleware\Filament\ApplyFilamentTenantThemeMiddleware;
use App\Models\Shop;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use BezhanSalleh\FilamentShield\Middleware\SyncShieldTenant;
use Caresome\FilamentAuthDesigner\AuthDesignerPlugin;
use Caresome\FilamentAuthDesigner\Enums\MediaPosition;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filafly\Icons\Iconoir\IconoirIcons;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ShopPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('shop')
            ->path('shop')
            ->login()
            ->registration()
            ->colors([
                'primary' => Color::Blue,
            ])
            ->font('Albert Sans')
            ->sidebarWidth('15rem')
            ->spa(hasPrefetching: true)
            ->brandLogo(asset('imgs/bulkit_logo.png', true))
            ->brandLogoHeight('5rem')
            ->favicon(asset('imgs/bulkit_logo.png'))
            ->topBar(false)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                AuthDesignerPlugin::make()
                    ->defaults(fn ($config) => $config
                        ->media('https://images.unsplash.com/photo-1578844251758-2f71da64c96f?q=80&w=1742&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')
                        ->mediaPosition(MediaPosition::Cover)
                        ->blur(8)
                    )
                    ->login() // Uses defaults
                    ->registration() // Uses defaults
                    ->passwordReset(fn ($config) => $config
                                        ->mediaPosition(MediaPosition::Left) // Override position
                                        ->mediaSize('45%')
                    )
                    ->emailVerification() // Uses defaults
                    ->themeToggle(),
                IconoirIcons::make(),
                FilamentShieldPlugin::make()
                    ->navigationLabel('Roles')
                    ->navigationIcon(Iconoir::ShieldBroken)
                    ->activeNavigationIcon(Iconoir::ShieldCheck)
                    ->navigationGroup('Manage Users')
                    ->navigationSort(20)
                    ->navigationBadgeColor('success')
                    ->scopeToTenant(true)                       // bool|Closure
                    ->tenantRelationshipName('shops')    // string|Closure|null
                    ->tenantOwnershipRelationshipName('shop'), // string|Closure|null,
            ])
            ->tenantMiddleware([
                ApplyFilamentTenantThemeMiddleware::class,
                ApplyShopScopes::class,
                SyncShieldTenant::class,
            ], isPersistent: true)
            ->authMiddleware([
                Authenticate::class,
            ])
            ->tenant(Shop::class, ownershipRelationship: 'shop', slugAttribute: 'slug')
            ->tenantRegistration(RegisterShop::class)
            ->tenantProfile(EditShopProfile::class);
    }
}
