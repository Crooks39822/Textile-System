<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;

class SyncLocalToCpanel extends Command
{
    // 🟢 Place it here
    protected $signature = 'sync:local-to-cpanel';

    protected $description = 'Sync attendance records from local DB to CPanel DB';

    public function handle()
    {
        $this->info("Fetching local records...");

        $localRecords = Attendance::all();

        if ($localRecords->isEmpty()) {
            $this->warn("No records found in local database.");
            return;
        }

        $this->info("Syncing to remote CPanel database...");

        foreach ($localRecords as $record) {
            try {
                DB::connection('cpanel')->table('mtf_attendances')->updateOrInsert(
                    [
                        'employee_number' => $record->employee_number,
                        'date' => $record->date,
                    ],
                    [
                        'check_in' => $record->check_in,
                        'check_out' => $record->check_out,
                        'created_at' => $record->created_at,
                        'updated_at' => now(),
                    ]
                );
            } catch (\Exception $e) {
                $this->error("Failed to sync record for {$record->employee_number} on {$record->date}: " . $e->getMessage());
            }
        }

        $this->info("Sync completed: " . $localRecords->count() . " records processed.");
    }
}
