<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'slug', 'phone', 'email', 'address', 'latitude', 'longitude', 'logo', 'other_details'])]
class Shop extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'other_details' => 'array',
        ];
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function getBrandLogo()
    {
        if ($this->logo) {
            return asset('storage/'.$this->logo);
        }

        return asset('imgs/bulkit_logo.png');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'shop_user', 'shop_id', 'user_id')->withTimestamps();
    }

    /** @return HasMany<Role, self> */
    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }

    /** @return HasMany<Role, self> */
    public function shops(): HasMany
    {
        return $this->hasMany(Role::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'shop_id', 'id');
    }

    /** @return HasMany<Appointment, self> */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /** @return HasMany<Product, self> */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /** @return HasMany<ServiceCategory, self> */
    public function serviceCategories(): HasMany
    {
        return $this->hasMany(ServiceCategory::class);
    }

    /** @return HasMany<Service, self> */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /** @return HasMany<ProductCategory, self> */
    public function productCategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class);
    }

    /** @return HasMany<Vehicle, self> */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    /** @return HasMany<Brand, self> */
    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class, 'shop_id', 'id');
    }

    /** @return HasMany<RoadSideRequest, self> */
    public function roadsideRequests(): HasMany
    {
        return $this->hasMany(RoadSideRequest::class, 'shop_id', 'id');
    }

    /** @return HasMany<Schedule, self> */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'shop_id', 'id');
    }

    /** @return HasMany<Review, self> */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'shop_id', 'id');
    }

    /** @return HasMany<EmployeeLocation, self> */
    public function employeeLocations(): HasMany
    {
        return $this->hasMany(EmployeeLocation::class, 'shop_id', 'id');
    }

    /** @return HasMany<InventoryLog, self> */
    public function inventoryLogs(): HasMany
    {
        return $this->hasMany(InventoryLog::class, 'shop_id', 'id');
    }
}
