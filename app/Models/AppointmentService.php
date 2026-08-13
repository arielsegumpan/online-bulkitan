<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable(['shop_id', 'appointment_id', 'service_id', 'price'])]
class AppointmentService extends Model
{
    protected $cast = [
        'price' => 'decimal:2',
    ];

    public function shop() : BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
    
    public function appointment() : BelongsTo
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'id');
    }

    public function service() : BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
