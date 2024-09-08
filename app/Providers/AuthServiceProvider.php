<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function register()
    {
        parent::register();

        $this->app->bind('abilities' , function(){
            return include base_path( '/app/Data/abilities.php') ;
        });
}

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function($user ,$ability){
            if($user->super_admin){
                return true;
            }
        });

        foreach($this->app->make('abilities') as $code => $ability){
            Gate::define($code,function ($user) use ($code){
                return $user->hasAbility($code);
            });
        }
//        Gate::define('categories.view' , function($user){
//            return true ;
//        });
//
//        Gate::define('categories.create' , function($user){
//            return false ;
//        });
//
//        Gate::define('categories.update' , function($user){
//            return false ;
//        });
//
//        Gate::define('categories.delete' , function($user){
//            return true ;
//        });

    }
}
