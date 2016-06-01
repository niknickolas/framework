<?php

namespace Themosis\Route;

use Illuminate\Events\Dispatcher;
use Themosis\Foundation\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {
        /*
         * Register the Events Dispatcher into the container.
         */
        $this->app->singleton('events.dispatcher', function ($container) {
            return new Dispatcher($container);
        });
        $this->app->singleton('router', function ($container) {
            return new Router($container['events.dispatcher'], $container);
        });
    }
}
