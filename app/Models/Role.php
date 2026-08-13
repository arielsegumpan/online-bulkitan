<?php

declare(strict_types=1);

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends SpatieRole
{
    //

    /** @return BelongsTo<\App\Models\Shop, self> */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Shop::class);
    }

}
