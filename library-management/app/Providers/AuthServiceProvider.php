<?php

// namespace App\Providers;

// use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Gate;

// class AuthServiceProvider extends ServiceProvider
// {
//     protected $policies = [
//         // Define your model policies here
//     ];

//     public function boot()
//     {
//         $this->registerPolicies();

//         // Additional authorization logic can go here
//     }
// }

// <?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as BaseAuthServiceProvider;

class AuthServiceProvider extends BaseAuthServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // You can add any additional custom logic if needed.
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

