<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Company;
use Illuminate\Auth\Access\Response;
use App\Policies\CompanyPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Company::class => CompanyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
       
       
    
        Gate::define('update-company', function (User $user) {
        
            return $user->role=="user"
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });

        //
    }
}
