<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ReminderTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Reminder:start';

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
        $date = date('Y-m-d');
        $nextDate = date('Y-m-d', strtotime('+1 day',time()));
        $list = Appointment::whereIn('date', [$date, $nextDate])
            ->where('isActive', APPOINTMENT_SUCCESS)
            ->where('isSend', REMINDER_DEFAULT)
            ->get();


    }
}
