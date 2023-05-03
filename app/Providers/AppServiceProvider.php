<?php

namespace App\Providers;

use Queue;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Đăng ký event lắng nghe khi 1 queued job thất bại, sử dụng Queue:failing
        Queue::failing(function (JobFailed $event) {
            // $event->connectionName
            // $event->job
            // $event->data
        });
    }
}
