<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable(['shop_id', 'roadside_request_id', 'employee_id', 'assigned_at', 'arrival_at', 'completed_at', 'status'])]
class RoadSideAssignment extends Model
{
    public function shop() : BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
    public function request(): BelongsTo
    {
        return $this->belongsTo(RoadSideRequest::class, 'roadside_request_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
