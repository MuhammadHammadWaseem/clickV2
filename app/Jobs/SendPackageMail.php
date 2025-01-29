<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Mail\PackageConfirmationMail;
use Illuminate\Support\Facades\Mail;

class SendPackageMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $user;
    protected $package;
    protected $eventId;
    public function __construct(User $user, $package, $eventId)
    {
        $this->user = $user;
        $this->package = $package;
        $this->eventId = $eventId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new PackageConfirmationMail($this->user, $this->package, $this->eventId));
    }
}
