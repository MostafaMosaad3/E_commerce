<?php

namespace App\Policies;

use App\Models\User;
use App\Models\role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *

     */
    public function viewAny($user)
    {
        return $user->hasAbility('roles.view');
    }

    /**
     * Determine whether the user can view the model.
     *
     */
    public function view($user, role $role)
    {
        return $user->hasAbility('roles.view');
    }

    /**
     * Determine whether the user can create models.
     *

     */
    public function create( $user)
    {
        return $user->hasAbility('roles.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     */
    public function update( $user, role $role)
    {
        return $user->hasAbility('roles.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     */
    public function delete( $user, role $role)
    {
        return $user->hasAbility('roles.delete');
    }


    public function restore( $user, role $role)
    {
        return $user->hasAbility('roles.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.

     */
    public function forceDelete( $user, role $role)
    {
        return $user->hasAbility('roles.force');
    }
}
