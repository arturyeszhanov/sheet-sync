<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SheetSyncService;

class SyncSheets extends Command
{   
    
    // Команду можно вызвать через: php artisan sheets:sync
    protected $signature = 'sheets:sync';
    protected $description = 'Синхронизировать записи со статусом Allowed в Google Таблицу';

    public function handle()
    {   
        
        $this->info('Начало синхронизации...');

        try {
            $service = new SheetSyncService();
            $service->exportAllowedRecords();

            $this->info('Синхронизация завершена.');
        } catch (\Exception $e) {
            $this->error('Ошибка: ' . $e->getMessage());
        }

        return 0;
        

    }
}
