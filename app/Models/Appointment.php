<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([ 'shop_id', 'customer_id', 'vehicle_id', 'employee_id', 'appointment_number', 'start_time', 'end_time', 'status', 'notes', 'created_by' ])]
class Appointment extends Model
{
    public function shop() : BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function customer() : BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function appointmentServices() : HasMany
    {
        return $this->hasMany(AppointmentService::class, 'appointment_id', 'id');
    }
}
