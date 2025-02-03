<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PackageConfirmationMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $package;
    public $eventId;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $package, $eventId)
    {
        $this->user = $user;
        $this->package = $package;
        $this->eventId = $eventId;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Package Purchase Confirmation',
        );
    }

    public function build()
    {
        // Debug to check values
        \Log::info("Event ID inside Mail: " . $this->eventId);

        return $this->subject('Package Purchase Confirmation')
            ->view('mails.package_confirmation_admin', [
                'userName' => $this->user->name,
                'packageName' => $this->package,
                'eventId' => $this->eventId,
            ]);
    }

}