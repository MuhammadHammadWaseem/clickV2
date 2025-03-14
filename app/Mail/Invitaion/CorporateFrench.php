<?php

namespace App\Mail\Invitaion;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorporateFrench extends Mailable
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


    public function build()
    {
        return $this->from('info@clickinvitation.com')
                    ->view('mails.Invittaion.corporateFrench')
                    ->subject('Welcome to Click Invitation')
                    ->with(['data' => $this->data]);
    }
}
