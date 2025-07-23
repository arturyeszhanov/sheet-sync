<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\SyncSheets::class,
        \App\Console\Commands\SheetsFetch::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        \Log::info('✅ schedule() вызван в ' . now());
        // Каждый раз в минуту
        $schedule->command('sheets:sync')->everyMinute()->evenInMaintenanceMode()->withoutOverlapping(false);


    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
