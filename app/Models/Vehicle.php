<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['customer_id', 'plate_number', 'vehicle_type', 'brand', 'model', 'year_model', 'tire_size',])]
class Vehicle extends Model
{
    public function customer() : BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function appointments() : HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
