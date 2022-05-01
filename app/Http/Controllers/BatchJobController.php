<?php

namespace App\Http\Controllers;

use App\Jobs\CreateUser;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

class BatchJobController extends Controller
{
    public function run()
    {
        Bus::batch([
            // jobs here
            new CreateUser()
        ])->then(function (Batch $batch) { // callback then: khi công việc thực hiện thành công
            $message = 'Batch [' . $batch->id . '] has been finished successfully<br/>';
            echo $message;
            info($message);
        })->catch(function (Batch $batch) { // callback catch: khi công việc thực hiện không thành công
            $message = 'Batch [' . $batch->id . '] failed to process all jobs<br/>';
            echo $message;
            info($message);
        })->finally(function (Batch $batch) { // callback finally: khi công việc kết thúc
            $message = 'Batch [' . $batch->id . '] finished processing<br/>';
            echo $message;
            info($message);
        })->dispatch();
    }
}
