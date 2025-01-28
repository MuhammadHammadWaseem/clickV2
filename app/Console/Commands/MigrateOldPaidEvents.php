<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MigrateOldPaidEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate-old-paid-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // IDs of the Basic and Comprehensive Packages
        $basicPackageId = 1; // Assuming 1 is the Basic Package ID
        $comprehensivePackageId = 2; // Assuming 2 is the Comprehensive Package ID

        // Get all events with `paid = 1`
        $oldPaidEvents = DB::table('events')
            ->where('paid', 1)
            ->get();

        foreach ($oldPaidEvents as $event) {
            $userId = $event->id_user;
            $eventId = $event->id_event;

            // Step 1: Ensure the user has the Basic package first, then the Comprehensive
            $packagesToAssign = [$basicPackageId, $comprehensivePackageId];

            foreach ($packagesToAssign as $packageId) {
                // Check if the user already has the package
                $userPackageExists = DB::table('user_packages')
                    ->where('user_id', $userId)
                    ->where('package_id', $packageId)
                    ->exists();

                // If the user doesn't have the package, add it
                if (!$userPackageExists) {
                    DB::table('user_packages')->insert([
                        'user_id' => $userId,
                        'package_id' => $packageId,
                        'price_paid' => 0, // No charge for migration
                        'start_date' => Carbon::now(),
                        'end_date' => null, // Lifetime access for old events
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }

            // Step 2: Ensure the event is linked to both packages in `package_event`
            foreach ($packagesToAssign as $packageId) {
                // Check if the event is already linked to the package
                $packageEventExists = DB::table('package_event')
                    ->where('event_id', $eventId)
                    ->where('package_id', $packageId)
                    ->exists();

                // If the event isn't linked to the package, add it
                if (!$packageEventExists) {
                    DB::table('package_event')->insert([
                        'event_id' => $eventId,
                        'package_id' => $packageId,
                        'price_paid' => 0, // No charge for migration
                        'start_date' => Carbon::now(),
                        'end_date' => null, // Lifetime access for old events
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        echo "Migration of old paid events with both packages (Basic first, then Comprehensive) completed.";
    }
}