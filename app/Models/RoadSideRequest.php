<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([ 'shop_id', 'customer_id', 'vehicle_id', 'request_number', 'latitude', 'longitude', 'address', 'problem_type', 'description', 'status', 'requested_at', 'accepted_at', 'completed_at' ])]
class RoadSideRequest extends Model
{
    public function shop() : BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function customer() : BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function vehicle() : BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function assignments() : HasMany
    {
        return $this->hasMany(RoadSideAssignment::class, 'roadside_request_id');
    }
}
