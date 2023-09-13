<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'access-users');
    }

    public function view(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'view-users');
    }

    public function update(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'edit-users');
    }

    public function delete(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'delete-users');
    }
}
