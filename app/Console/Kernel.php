<?php

namespace App\Console;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\EmailDueUsers;
use App\Console\Commands\PayoutCron;
use App\Console\Commands\WinnerCron;
use App\Models\User;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        \App\Console\Commands\WinnerCron::class,
        \App\Console\Commands\EmailDueUsers::class,
        \App\Console\Commands\PayoutCron::class,
    ];

    protected function schedule(Schedule $schedule)
    {

        $schedule->command('winner:cron')->everyMinute();
        $filePath = 'public/insurance_cron.txt';
        $schedule->command('email:users')->everyMinute()->appendOutputTo($filePath);
        $filePath = 'public/payout_cron.txt';
        $schedule->command('payout:cron')->everyMinute()->appendOutputTo($filePath);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
