<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Str;

class ModelPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    public function __call($method, $parameters){
        $class_name = Str::replace('Policy' , '' ,  Class_basename($this));
        $class_name = Str::plural(Str::lower($class_name));

        if($method == 'viewAny'){
            $method = 'view' ;
        }

        $ability =   Str::kebab($class_name) . '.' . $method  ;

        $user = $parameters[0] ;

        return $user->hasAbility($ability);
    }
}
