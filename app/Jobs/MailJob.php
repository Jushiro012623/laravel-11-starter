<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class MailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private string $email, 
        private  Mailable $mailable
    ){}
    
    /**
     * Execute the job.
     */
    public function handle(): void
    {
         Mail::to($this->email)->send($this->mailable);
    }
}
