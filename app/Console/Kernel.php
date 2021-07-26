<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\DpibCron::class,
        Commands\QuoteuploadCron::class,
        Commands\RenewaluploadCron::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        
        $schedule->command('dpib:cron')
                 ->everyMinute();
        
       $schedule->command('dpib:cron')
                 ->everyMinute()->withoutOverlapping();
        
//         $schedule->command('quoteUpload:cron')
//                 ->everyMinute();

        $schedule->command('makeRenewallist:cron')
                 ->everyMinute()->withoutOverlapping()->sendOutputTo(storage_path('logs/renewal.log'));
        
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
