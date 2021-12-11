<?php

namespace App\Console;

use App\Models\Appointment;
use DateTime;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $appointments = Appointment::where('status', 0)->get();
            for ($count=0; $count<count($appointments); $count++){
//                $start_date = DateTime::createFromFormat($appointments[0]->start_date)->format("Y-m-d");
                $start_date = Carbon::parse($appointments[$count]->start_date);
                $current_date = Carbon::now();
                $days_left = $start_date->diffInDays($current_date);
                if ($days_left < 0){
                    $appointments[$count]->update([
                        'status' => 4,
                    ]);
                }
                else if ($days_left = 0){
                    $bid_hourly_rate = $appointments[$count]->max_hourly_rate;
                    $appointments[$count]->update([
                        'bid_hourly_rate' => $bid_hourly_rate,
                    ]);
                }
                else{
                    $per = 30/$days_left;
                    $bid_hourly_rate = $appointments[$count]->min_hourly_rate+(($appointments[$count]->max_hourly_rate/100)*$per);
                    $appointments[$count]->update([
                        'bid_hourly_rate' => $bid_hourly_rate,
                    ]);
                }
            }
        })->everyMinute();
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
