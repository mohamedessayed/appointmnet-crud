<?php

namespace App\Traits;

use App\Services\RoleService;

trait HasRole
{
    public function isAllow(string $role ): bool {
        return RoleService::hasRole($role);
    }
}
