<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Libraries\CSVFile;

use Illuminate\Support\Facades\DB;

class ImportInventoryFromAuctionFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $filePath;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $collections = collect((new CSVFile)->read($this->filePath));

        $chunks = $collections->chunk(2)->toArray();

        array_walk($chunks,function($data){
            DB::table('stocks')->insert($data);
        });
    }
}
