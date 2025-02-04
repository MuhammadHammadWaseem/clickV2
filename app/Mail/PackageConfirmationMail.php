<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PackageConfirmationMail extends Mailable
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
    public function __construct($user, $package, $eventId, $upgradeCost, $isUpgrade)
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

    // public function build()
    // {
    //     dd($this->eventId);
    //     $filePath = public_path('assets/files/CSV List.csv');
    //     return $this->subject('Package Purchase Confirmation')
    //         ->view('mails.package_confirmation')
    //         ->attach($filePath, [
    //             'as' => 'CSV List.csv', // Name of the file in the email
    //             'mime' => 'text/csv',    // MIME type for CSV
    //         ])
    //         ->with([
    //             'userName' => $this->user->name,
    //             'packageName' => $this->package,
    //             'eventId' => $this->eventId,
    //         ]);
    // }
    public function build()
    {
        // Debug to check values
        \Log::info("Event ID inside Mail: " . $this->eventId);

        $filePath1 = public_path('assets/files/CSV List.csv');

        $filePath2 = public_path('assets/files/Guest List.csv');

        return $this->subject('Package Purchase Confirmation')
            ->view('mails.package_confirmation', [
                'userName' => $this->user->name,
                'packageName' => $this->package,
                'eventId' => $this->eventId,
                'upgradeCost' => $this->upgradeCost,
                'isUpgrade' => $this->isUpgrade,
            ]) // Pass variables directly here
            ->attach($filePath1, [
                'as' => 'CSV List.csv',
                'mime' => 'text/csv',
            ])
            ->attach($filePath2, [
                'as' => 'Guest List.csv',
                'mime' => 'text/csv',
            ]);
    }

}
