<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'access-permissions');
    }
}
