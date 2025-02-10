<?php

namespace App\Mail\Invitaion;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventsFrench extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
    public function __construct($data)
    {
       $this->data = $data;
    }


    public function content()
    {
        return $this->from('noreply@clickinvitation.com', $this->data['event']->name)
                    ->view('mails.Invittaion.eventsFrench')
                    ->subject($this->data['event']->name)
                    ->with(['data' => $this->data]);
    }
}
