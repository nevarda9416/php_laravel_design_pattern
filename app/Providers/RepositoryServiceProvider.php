<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any repository services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            App\Repositories\User\UserRepositoryInterface::class,
            App\Repositories\User\UserRepository::class
        );
    }

    /**
     * Bootstrap any repository services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
