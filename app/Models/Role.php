<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public const PAGINATION_LIMIT = 10;

    public function scopeFilter($query)
    {
        return $query->when($search = request('search'), function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    }
}
