<?php

namespace App\Concerns ;

use App\Models\Role;

Trait HasRoles
{
    public function roles()
    {
        return $this->morphToMany(Role::class , 'authorizable' , 'role_user');
    }


    public function hasAbility($ability)
    {
        $denies =$this->roles()->whereHas('abilities' , function($query) use ($ability){
        $query->where('ability' , $ability)
            ->where('type' , 'deny');
        })->exists();

        if($denies){
            return false ;
        }


        return $this->roles()->whereHas('abilities' , function($query) use ($ability){
            $query->where('ability' , $ability)
                ->where('type' , 'allow');
        })->exists();

    }
}
