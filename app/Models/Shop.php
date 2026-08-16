<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name','slug','phone','email','address','latitude','longitude','logo','other_details'])]
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
            'other_details' => 'array'
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

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'shop_user','shop_id','user_id')->withTimestamps();
    }

    /** @return HasMany<\App\Models\Role, self> */
    public function roles(): HasMany
    {
        return $this->hasMany(\App\Models\Role::class);
    }


    /** @return HasMany<\App\Models\Role, self> */
    public function shops(): HasMany
    {
        return $this->hasMany(\App\Models\Role::class);
    }


    /** @return HasMany<\App\Models\Appointment, self> */
    public function appointments(): HasMany
    {
        return $this->hasMany(\App\Models\Appointment::class);
    }


    /** @return HasMany<\App\Models\Product, self> */
    public function products(): HasMany
    {
        return $this->hasMany(\App\Models\Product::class);
    }


    /** @return HasMany<\App\Models\ServiceCategory, self> */
    public function serviceCategories(): HasMany
    {
        return $this->hasMany(\App\Models\ServiceCategory::class);
    }


    /** @return HasMany<\App\Models\Service, self> */
    public function services(): HasMany
    {
        return $this->hasMany(\App\Models\Service::class);
    }


    /** @return HasMany<\App\Models\ProductCategory, self> */
    public function productCategories(): HasMany
    {
        return $this->hasMany(\App\Models\ProductCategory::class);
    }


    /** @return HasMany<\App\Models\Vehicle, self> */
    public function vehicles(): HasMany
    {
        return $this->hasMany(\App\Models\Vehicle::class);
    }


    /** @return HasMany<\App\Models\Brand, self> */
    public function brands(): HasMany
    {
        return $this->hasMany(\App\Models\Brand::class);
    }

}
