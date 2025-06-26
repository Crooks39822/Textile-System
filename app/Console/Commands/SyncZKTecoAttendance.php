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
        $this->info("Connecting to device at $ip...");

        if (!$zk->connect()) {
            $this->error("❌ Failed to connect to $ip");
            continue;
        }

        $this->info("✅ Connected to $ip. Fetching logs...");
        $logs = $zk->getAttendance();

        if (!empty($logs)) {
            $allLogs = array_merge($allLogs, $logs);
        }

        $zk->disconnect();
    }

    if (empty($allLogs)) {
        $this->warn("No logs found from any device.");
        return;
    }

    $this->info("✅ Total combined logs: " . count($allLogs));

    // Group and process
    $grouped = [];
    foreach ($allLogs as $log) {
        $empNumber = $log['id'];
        $timestamp = Carbon::parse($log['timestamp']);
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

    // Save to DB
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
    }

    $this->info("✅ Attendance sync completed for " . count($grouped) . " records.");
}
}  

     

