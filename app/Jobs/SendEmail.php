<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\Emailer\Emailer;
use App\Models\Subscriber\Subscriber;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Emailer Object
     * 
     * @var object
     */
    protected $emailer; 

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Emailer $emailer)
    {
        $this->emailer = $emailer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd($this->emailer);
    }
}
