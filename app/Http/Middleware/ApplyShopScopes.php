<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyShopScopes
{
    /**
     * Models that should be automatically scoped to the current tenant.
     *
     * @var array<class-string>
     */
    protected array $tenantScopedModels = [
        User::class
    ];

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($tenant = Filament::getTenant()) {
            foreach ($this->tenantScopedModels as $model) {
                $model::addGlobalScope(
                    'shop',
                    fn (Builder $query) => $query->whereHas(
                        'shops',
                        fn (Builder $q) => $q->whereKey($tenant->getKey())
                    ),
                );
            }
        }

        return $next($request);
    }
}
