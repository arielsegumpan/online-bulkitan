<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['shop_id','customer_id', 'plate_number', 'vehicle_type', 'brand', 'model', 'year_model',])]
class Vehicle extends Model
{
    public function shop() : BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
    public function customer() : BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function appointments() : HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
