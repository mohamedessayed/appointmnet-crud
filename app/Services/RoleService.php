<?php

namespace App\Services;

class RoleService
{
    /**
     * Create a new class instance.
     */
    public static function hasRole(string $role){
        return auth('web')->user()
                ->roles->where('name',$role)
                ->first() ? true:false;
    }
}
