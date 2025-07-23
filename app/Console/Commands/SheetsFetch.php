<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SheetSyncService;
use Symfony\Component\Console\Helper\Table;


class SheetsFetch extends Command
{
    protected $signature = 'sheets:fetch {--count= : Количество строк}';
    protected $description = 'Получение ID и комментариев из Google Sheets';

    public function handle(SheetSyncService $sheetService)
{
    $this->info('Чтение данных из Google Sheets...');

    $count = (int) $this->option('count') ?: null;

    $rows = $sheetService->readSheet();
    if (!$rows || count($rows) < 2) {
        $this->warn('Нет данных или только заголовки.');
        return;
    }

    $dataRows = array_slice($rows, 1); // Пропускаем заголовки
    if ($count) {
        $dataRows = array_slice($dataRows, 0, $count);
    }

    $filteredRows = [];
    $bar = $this->output->createProgressBar(count($dataRows));
    $bar->start();

    foreach ($dataRows as $row) {
        $id = $row[0] ?? null;
        $comment = trim($row[3] ?? '');
    
        if ($id && $comment !== '') {
            
            $filteredRows[] = [$id, $comment];
            $bar->advance();
          
            usleep(100_000);
        }
    }
    

    $bar->finish();
    $this->newLine(2);

    if (count($filteredRows) === 0) {
        $this->warn('Нет строк с комментариями.');
        return;
    }

    $this->table(['ID', 'Комментарий'], $filteredRows);
    $this->info("Всего строк с комментариями: " . count($filteredRows));
}

}
