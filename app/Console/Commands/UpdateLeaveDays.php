<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;

class UpdateLeaveDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-leave-days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update leave days for employees monthly';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $employees = User::all();

        foreach ($employees as $employee) {
            $employmentDate = Carbon::parse($employee->admission_date);
            $currentDate = Carbon::now();

            $monthsWorked = $employmentDate->diffInMonths($currentDate);
            $leaveDays = $monthsWorked * 1.25;

            // Cap at 15 days per year
            $employee->leave_days = min($leaveDays, 15);
            $employee->save();
        }

        $this->info('Leave days updated successfully.');
    }
}
