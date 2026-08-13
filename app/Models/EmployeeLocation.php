<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['shop_id','employee_id', 'latitude', 'longitude', 'recorded_at'])]
class EmployeeLocation extends Model
{
    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function shop() : BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    
}
