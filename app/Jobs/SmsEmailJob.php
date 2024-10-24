<?php

namespace App\Jobs;

use App\Mail\SmsEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SmsEmailJob implements ShouldQueue
{
    use  Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */


     public $fake;
     public $guest;
     public $event;
     public $cardId;
     public $lang;
     public $email;
     public function __construct($fake, $lang, $cardId, $event, $guest, $email)
     {
         $this->email = $email;
         $this->fake = $fake;
         $this->guest = $guest;
         $this->event = $event;
         $this->cardId = $cardId;
         $this->lang = $lang;
     }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Ensure you pass all five parameters
        $email = new SmsEmail($this->email, $this->event, $this->guest, $this->cardId, $this->lang, $this->fake);
        Mail::to($this->email)->send($email);
    }

}
