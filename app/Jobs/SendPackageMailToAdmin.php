<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Mail\PackageConfirmationMailToAdmin;
use Illuminate\Support\Facades\Mail;

class SendPackageMailToAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $mail;
    protected $user;
    protected $package;
    protected $eventId;
    protected $upgradeCost;
    protected $isUpgrade;
    public function __construct($mail, User $user, $package, $eventId, $upgradeCost, $isUpgrade)
    {
        $this->mail = $mail;
        $this->user = $user;
        $this->package = $package;
        $this->eventId = $eventId;
        $this->upgradeCost = $upgradeCost;
        $this->isUpgrade = $isUpgrade;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->mail)->send(new PackageConfirmationMailToAdmin($this->user, $this->package, $this->eventId, $this->upgradeCost, $this->isUpgrade));
    }
}
