<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

#[Fillable([ 'shop_id','product_id', 'type', 'quantity', 'before_stock', 'after_stock', 'reference_type', 'reference_id', 'remarks' ])]
class InventoryLog extends Model
{
    public function shop() : BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // ADDED: reference_type/reference_id were plain columns with no
    // relationship defined. Turning them into a real morphTo lets you do
    // $log->reference (e.g. the Sale or AppointmentService that caused the
    // stock movement) instead of resolving the type/id manually everywhere.
    public function reference(): MorphTo
    {
        return $this->morphTo();
    }
}
