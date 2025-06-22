<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\SyncFplTeams::class,
        \App\Console\Commands\SyncFplTeams::class,
        \App\Console\Commands\SyncFplPlayers::class,
        \App\Console\Commands\SyncFplMatches::class,
        \App\Console\Commands\SyncFplTeams::class,
        \App\Console\Commands\SyncFplPlayers::class,
        \App\Console\Commands\SyncFplMatches::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('player:updatemarket')->daily(); // or `->everyMinute()` for testing
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }


}
