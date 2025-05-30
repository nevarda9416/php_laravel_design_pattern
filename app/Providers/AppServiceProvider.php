<?php

namespace App\Providers;

use App\Services\Contracts\LeaveStatus\LeaveStatusService;
use App\Services\Contracts\LeaveStatus\LeaveStatusServiceInterface;
use App\Services\Contracts\RequestingLeaveStatus\RequestingLeaveStatusService;
use App\Services\Contracts\RequestingLeaveStatus\RequestingLeaveStatusServiceInterface;
use App\Services\Contracts\RequestingReopenStatus\RequestingReopenStatusService;
use App\Services\Contracts\RequestingReopenStatus\RequestingReopenStatusServiceInterface;
use App\Services\Contracts\RunningStatus\RunningStatusService;
use App\Services\Contracts\RunningStatus\RunningStatusServiceInterface;
use App\Services\Contracts\StoppingStatus\StoppingStatusService;
use App\Services\Contracts\StoppingStatus\StoppingStatusServiceInterface;
use App\Services\Notifications\Drivers\Email\EmailNotificationDriver;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;
use Queue;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RunningStatusServiceInterface::class => RunningStatusService::class,
        StoppingStatusServiceInterface::class => StoppingStatusService::class,
        RequestingReopenStatusServiceInterface::class => RequestingReopenStatusService::class,
        RequestingLeaveStatusServiceInterface::class => RequestingLeaveStatusService::class,
        LeaveStatusServiceInterface::class => LeaveStatusService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('notification.driver.email', EmailNotificationDriver::class);
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
        Storage::extend('sftp', function ($app, $config) {
            return new Filesystem(new SftpAdapter($config));
        });
    }
}
