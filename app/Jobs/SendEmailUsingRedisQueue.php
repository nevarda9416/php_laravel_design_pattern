<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class SendEmailUsingRedisQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $detail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($detail)
    {
        $this->detail = $detail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $time = microtime();
        // Allow only 2 emails (maxLocks) every 1 second (decay)
        Redis::throttle('key_sendemail_' . $time)->allow(2)->every(1)->then(function () {
            echo 'Emailed to '. $this->detail['name'];
            Log::info('Emailed to '. $this->detail['name']);
        }, function () {
            // Release the job back into the queue, 2: job number
            return $this->release(2);
        });
    }
}
