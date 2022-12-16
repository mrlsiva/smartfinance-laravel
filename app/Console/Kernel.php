<?php

namespace App\Console;
use App\Console\Commands\EmailDueUsers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        EmailDueUsers::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $filePath = 'public/insurance_cron.txt';
        $schedule->command('email:users')->everyMinute()->emailOutputTo('tena.visansoft@gmail.com');
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
