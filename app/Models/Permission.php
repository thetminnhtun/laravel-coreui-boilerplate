<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public const PERMISSIONS = [
        // Users
        'view users',
        'create users',
        'edit users',
        'delete users',
        // Role
        'view roles',
        'create roles',
        'edit roles',
        'delete roles',
    ];

    public static function removeInvalid(array $permissions)
    {
        return collect($permissions)->filter(function ($permission) {
            return in_array($permission, self::PERMISSIONS);
        });
    }
}
