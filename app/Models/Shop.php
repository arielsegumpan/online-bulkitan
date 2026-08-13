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

}
