<?php

namespace App\Jobs;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ItemCSVUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    public array $header;

    /**
     * @var array
     */
    public array $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($header, $data)
    {
        $this->header = $header;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        foreach ($this->data as $item) {
            $itemCsvData = array_combine($this->header, $item);
            Item::create($itemCsvData);
        }
    }
}
