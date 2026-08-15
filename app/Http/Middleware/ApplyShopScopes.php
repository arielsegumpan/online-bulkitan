<?php

namespace App\Http\Middleware;

use App\Models\Appointment;
use App\Models\AppointmentService;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Closure;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyShopScopes
{
    /**
     * Models scoped via a BelongsToMany 'shops' relationship.
     *
     * @var array<class-string>
     */
    protected array $manyToManyModels = [
        User::class,
    ];

    /**
     * Models scoped via a BelongsTo 'shop' relationship (single shop_id column).
     *
     * @var array<class-string>
     */
    protected array $belongsToModels = [
        Appointment::class,
        AppointmentService::class,
        ServiceCategory::class,
        Service::class,
        Product::class,
        ProductCategory::class,
    ];

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($tenant = Filament::getTenant()) {
            foreach ($this->manyToManyModels as $model) {
                $model::addGlobalScope(
                    'shop',
                    fn (Builder $query) => $query->whereHas(
                        'shops',
                        fn (Builder $q) => $q->whereKey($tenant->getKey())
                    ),
                );
            }

            foreach ($this->belongsToModels as $model) {
                $model::addGlobalScope(
                    'shop',
                    fn (Builder $query) => $query->whereBelongsTo($tenant),
                );
            }
        }

        return $next($request);
    }
}