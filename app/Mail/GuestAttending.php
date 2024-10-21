<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuestAttending extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $guest;
    public $meal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $guest, $meal)
    {
        $this->event = $event;
        $this->guest = $guest;
        $this->meal = $meal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Guest Attending')
            ->from('clickinvitation@gmail.com', 'Click Invitation')
            ->view('mails.guest_attending')
            ->with([
                'event' => $this->event,
                'guest' => $this->guest,
                'meal' => $this->meal,
            ]);
    }
}
