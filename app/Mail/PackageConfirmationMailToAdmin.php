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
    public $upgradeCost;
    public $isUpgrade;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $package, $eventId, $upgradeCost = 0, $isUpgrade = false)
    {
        $this->user = $user;
        $this->package = $package;
        $this->eventId = $eventId;
        $this->upgradeCost = $upgradeCost;
        $this->isUpgrade = $isUpgrade;
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

        return $this->subject('Package Purchase Confirmation')
            ->view('mails.package_confirmation_admin', [
                'userName' => $this->user->name,
                'packageName' => $this->package,
                'eventId' => $this->eventId,
                'upgradeCost' => $this->upgradeCost,
                'isUpgrade' => $this->isUpgrade
            ]);
    }

}