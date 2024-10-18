<?php

namespace App\Jobs;

use App\Mail\RegisterMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class RegisterEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // Declare the $details property
    public $details;

    /**
     * Create a new job instance.
     *
     * @param array $details
     */
    public function __construct($details)
    {
        $this->details = $details;
       
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = new RegisterMail($this->details['confirmation_code']);
        Mail::to($this->details['email'])->send($email);
    }
    
}
