<?php

namespace App\Console\Commands;

use App\Models\InsuranceNotification;
use App\Http\Controllers\SMTPController;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EmailDueUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:users';

    protected $description = 'Email to Due Users';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now()->format('Y-m-d');
        $notifications = InsuranceNotification::where('date',$now)->get();

        foreach ($notifications as $notification) {

            $emailId = $notification->insurance->user->email;
            $subject = "Due for your insurance";
            $txt = "Your due for your insurance is within 5 days.";
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        echo $notifications;
    }
}
