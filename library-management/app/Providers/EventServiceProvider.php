<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Define your event listeners here
    ];

    public function boot()
    {
        parent::boot();

        // Additional event bootstrapping logic
    }
}
