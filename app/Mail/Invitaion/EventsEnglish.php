<?php

namespace App\Mail\Invitaion;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventsEnglish extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $sanitizedName = preg_replace('/[^a-zA-Z0-9]/', '', $this->data['event']->name); // Remove invalid characters
        $email = strtolower($sanitizedName) . '@clickinvitation.com'; // Convert to lowercase
        // return $this->from($email)
        return $this->from('noreply@clickinvitation.com', $this->data['event']->name)
                    ->view('mails.Invittaion.corporateEnglish')
                    ->subject($this->data['event']->name)
                    ->with([
                        'data' => $this->data,
                    ]);
    }
}
