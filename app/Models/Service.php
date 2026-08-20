<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['shop_id', 'service_category_id', 'service_name', 'service_desc', 'service_duration_minutes', 'service_price', 'is_mobile_service', 'is_active'])]
class Service extends Model
{
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function serviceCategory(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id', 'id');
    }

    public function employeeServices(): HasMany
    {
        return $this->hasMany(EmployeeService::class, 'service_id', 'id');
    }

    public function appointmentServices(): HasMany
    {
        return $this->hasMany(AppointmentService::class, 'service_id', 'id');
    }

    public function roadsideServices(): HasMany
    {
        return $this->hasMany(RoadSideService::class, 'service_id', 'id');
    }

    public function saleItems(): HasMany
    {
        return $this->hasMany(SaleItem::class, 'service_id', 'id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'service_id', 'id');
    }
}
