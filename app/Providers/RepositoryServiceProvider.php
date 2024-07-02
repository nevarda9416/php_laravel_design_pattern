<?php

namespace App\Providers;

use App\Repositories\Contract\StatusRepository;
use App\Repositories\Contract\StatusRepositoryInterface;
use App\Repositories\Object\User\UserRepository;
use App\Repositories\Object\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserRepositoryInterface::class => UserRepository::class,
        StatusRepositoryInterface::class => StatusRepository::class,
    ];

    /**
     * Register any repository services.
     *
     * @return void
     */
    public function register()
    {
        //
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
