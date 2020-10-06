<?php

namespace App\Console;

use App\Console\Commands\Add;
use App\Console\Commands\Collect;
use App\Console\Commands\Count;
use App\Console\Commands\Export;
use App\Console\Commands\Start;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Add::class,
        Collect::class,
        Start::class,
        Count::class,
        Export::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
