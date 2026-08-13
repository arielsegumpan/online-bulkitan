<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
