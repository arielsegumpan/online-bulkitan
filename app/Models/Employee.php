<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['shop_id', 'user_id', 'name', 'position', 'commission_rate', 'phone', 'hired_at', 'is_active',])]
class Employee extends Model
{
    public function shop() : BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function employeeServices(): HasMany
    {
        return $this->hasMany(EmployeeService::class, 'employee_id', 'id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'employee_id', 'id');
    }

    public function locations(): HasMany
    {
        return $this->hasMany(EmployeeLocation::class, 'employee_id', 'id');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function roadsideAssignments(): HasMany
    {
        return $this->hasMany(RoadSideAssignment::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class, 'served_by');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
