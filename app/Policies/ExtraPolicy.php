<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExtraPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'access-extras');
    }

    public function view(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'view-extras');
    }

    public function update(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'edit-extras');
    }

    public function delete(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'delete-extras');
    }
}
