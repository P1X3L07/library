<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Load routes
        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));  // Make sure this file exists
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        //
    }
}




// namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Route;

// class RouteServiceProvider extends ServiceProvider
// {
//     /**
//      * The path to the "web" routes file for the application.
//      *
//      * @var string
//      */
//     protected $webRoutes = __DIR__.'/../routes/web.php';

//     /**
//      * Define your route model bindings, pattern filters, and other route services.
//      *
//      * @return void
//      */
//     public function boot()
//     {
//         parent::boot();
//         $this->routes(function () {
//             Route::middleware('web')
//                 ->namespace($this->namespace)
//                 ->group(base_path('routes/web.php'));
//         });
//     }

//     public function map()
//     {
//         $this->mapWebRoutes();
//     }

//     protected function mapWebRoutes()
//     {
//         Route::middleware('web')
//             ->group(base_path('routes/web.php'));
//     }

//     /**
//      * Register any application services.
//      *
//      * @return void
//      */
//     public function register()
//     {
//         //
//     }
// }
