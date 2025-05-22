<?php

namespace App\Jobs;

use App\Models\Contact;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Contact::create([
            'name' => 'test',
            'email' => 'khaled@asser.com',
        ]);
    }
}
