<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MealInvitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $event;
    public $guest;
    public function __construct($event, $guest)
    {
        $this->event = $event;
        $this->guest = $guest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Please Select Your Meal')
            ->from('clickinvitation@gmail.com', 'Click Invitation')
            ->view('mails.mealinvitation', [
                'event' => $this->event,
                'guest'=> $this->guest
            ]);

    }
}