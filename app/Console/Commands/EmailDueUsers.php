<?php

namespace App\Console\Commands;

use App\Models\InsuranceNotification;
use App\Http\Controllers\SMTPController;
use Illuminate\Console\Command;
use App\Models\Template;
use Carbon\Carbon;
use DB;

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
        echo "working";
        $now = Carbon::now()->format('Y-m-d');
        $notifications = InsuranceNotification::where([['date',$now],['is_send',0]])->get();
        foreach ($notifications as $notification) {
            $emailsetting = Template::where([['id',39],['is_active',1]])->first(); 
            if($emailsetting != null){
                $email_template = $emailsetting->template;
                $emailContentReplace=['##NAME##'=>$notification->insurance->user->first_name.' '.$notification->insurance->user->last_name];
                $txt = strtr($email_template,$emailContentReplace);
                $emailId = $notification->insurance->user->email;
                $subject = $emailsetting->subject;
                $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
            }
            $insurance_notification = DB::table('insurance_notifications')->where('id',$notification->id)->update(['is_send' =>1]);

            if($notification->insurance->due == 'Monthly'){

                $date = Carbon::parse($notification->date)->addMonths(1);
            }

            if($notification->insurance->due == 'Yearly'){

                $date = Carbon::parse($notification->date)->addYears(1);
            }

            if($notification->insurance->due == 'Quarterly'){

                $date = Carbon::parse($notification->date)->addMonths(3);
            }


            if($date < $notification->insurance->end_date){

                $insurance_notification = InsuranceNotification::create([
                    'insurance_id' => $notification->insurance_id,
                    'date' => $date,
                    'is_send' => 0,
                ]);
            } 
        }

        echo $notifications->count()." mails was send in ".$now."\n";
    }
}
