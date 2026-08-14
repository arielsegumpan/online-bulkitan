<?php

namespace App\Http\Middleware\Filament;

use Closure;
use Illuminate\Http\Request;
use Filament\Facades\Filament;
use Symfony\Component\HttpFoundation\Response;

class ApplyFilamentTenantThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tenant = filament()->getTenant();

        // dd($tenant);
        if (!$tenant) {
            return $next($request);
        }

        Filament::getCurrentPanel()->brandLogo($tenant->getBrandLogo());
        Filament::getCurrentPanel()->brandLogoHeight('3.5rem');

        return $next($request);
    }
}
