<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any view services.
     *
     * @return void
     */
    public function register()
    {
        // single view bind
        View::composer(
            '*', // all views
            'App\Libraries\ViewComposers\CategoryComposer' // composer class name
        );
    }

    /**
     * Bootstrap any view services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
