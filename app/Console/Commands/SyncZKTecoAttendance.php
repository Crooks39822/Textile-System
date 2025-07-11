<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\User;
use Jmrashed\Zkteco\Lib\ZKTeco;

class SyncZKTecoAttendance extends Command
{
    protected $signature = 'zkteco:sync';
    protected $description = 'Sync attendance logs from ZKTeco device';

    public function handle()
    {
        $ips = [env('ZK_IP1'), env('ZK_IP2')]; // Define both device IPs
        $allLogs = [];

        foreach ($ips as $ip) {
            $zk = new ZKTeco($ip);
            $this->info("🔌 Connecting to device at $ip...");

            if (!$zk->connect()) {
                $this->error("❌ Failed to connect to $ip");
                continue;
            }

            $this->info("✅ Connected to $ip. Fetching logs...");

            // Retry logic to ensure full logs are fetched
            $logs = [];
            $lastCount = 0;
            $maxAttempts = 5;
            $attempt = 0;

            do {
                $attempt++;
                $fetched = $zk->getAttendance();
                $logs = array_merge($logs, $fetched);
                $logs = array_unique($logs, SORT_REGULAR); // remove duplicates
                $currentCount = count($logs);
                $this->info("📥 Attempt $attempt: Retrieved $currentCount logs");
            } while ($currentCount > $lastCount && $attempt < $maxAttempts);

            if (!empty($logs)) {
                $this->info("📌 Total logs from $ip: " . count($logs));
                $allLogs = array_merge($allLogs, $logs);
            }

            $zk->disconnect();
            sleep(1); // optional delay before the next device
        }

        if (empty($allLogs)) {
            $this->warn("⚠️ No logs found from any device.");
            return;
        }

        $this->info("✅ Combined total logs: " . count($allLogs));

        // Group logs per employee per day


        $grouped = [];
$cutoffDate = now()->subDays(4);

foreach ($allLogs as $log) {
    $empNumber = $log['id'];
    $timestamp = Carbon::parse($log['timestamp']);

    if ($timestamp->lt($cutoffDate)) {
        continue; // ⛔ skip logs older than 3 days
    }

    $date = $timestamp->toDateString();
    $time = $timestamp->toTimeString();
    $key = $empNumber . '|' . $date;

    if (!isset($grouped[$key])) {
        $grouped[$key] = [
            'employee_number' => $empNumber,
            'date' => $date,
            'check_in' => $time,
            'check_out' => $time,
        ];
    } else {
        $grouped[$key]['check_in'] = min($grouped[$key]['check_in'], $time);
        $grouped[$key]['check_out'] = max($grouped[$key]['check_out'], $time);
    }
}


        // Save grouped logs to DB
        $syncedCount = 0;
        foreach ($grouped as $entry) {
            Attendance::updateOrCreate(
                [
                    'employee_number' => $entry['employee_number'],
                    'date' => $entry['date'],
                ],
                [
                    'check_in' => $entry['check_in'],
                    'check_out' => $entry['check_out'],
                    'updated_at' => now(),
                ]
            );
            $syncedCount++;
        }

        $this->info("🎉 Attendance sync completed for $syncedCount records.");
    }
}
     

