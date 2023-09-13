<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'access-bookings');
    }

    public function view(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'view-bookings');
    }

    public function update(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'edit-bookings');
    }

    public function delete(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();

        return $permissions->contains('name', 'delete-bookings');
    }
}
