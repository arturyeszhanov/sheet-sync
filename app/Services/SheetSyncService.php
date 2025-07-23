<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;
use App\Models\Record;
use App\Models\Setting;
use Illuminate\Support\Str;

class SheetSyncService
{
    protected $client;
    protected $service;
    protected $spreadsheetId;

    public function __construct()
    {
        // Авторизация через сервисный аккаунт
        $this->client = new Google_Client();
        $this->client->setApplicationName('Sheet Sync Laravel');
        $this->client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAuthConfig(config('services.google.credentials_path'));
        $this->client->setAccessType('offline');

        $this->service = new Google_Service_Sheets($this->client);

        $setting = Setting::first();
        if (!$setting || !Str::contains($setting->google_sheet_url, '/d/')) {
            throw new \Exception('Ссылка на Google Таблицу не указана или некорректна.');
        }
        
        $this->spreadsheetId = Str::between($setting->google_sheet_url, '/d/', '/');
        
    }

    public function exportAllowedRecords()
    {
        $records = Record::allowed()->get();

        $existing = $this->service->spreadsheets_values->get($this->spreadsheetId, 'A2:D');
        $rows = $existing->getValues() ?? [];

        $commentsMap = [];
        foreach ($rows as $row) {
            if (!isset($row[0])) continue;
            $id = $row[0];
            $comment = $row[3] ?? '';
            $commentsMap[$id] = $comment;
        }

        $values = [];
        $header = ['ID', 'Text', 'Status', 'Comment'];
        $values[] = $header;

        foreach ($records as $record) {
            $values[] = [
                $record->id,
                $record->text,
                $record->status,
                $commentsMap[$record->id] ?? '',
            ];
        }

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values,
        ]);

        $params = ['valueInputOption' => 'RAW'];

        $this->service->spreadsheets_values->update(
            $this->spreadsheetId,
            'A1',
            $body,
            $params
        );
    }

    public function readSheet(): array
    {
        $spreadsheetId = $this->spreadsheetId;
        $range = 'A:Z';
        $response = $this->service->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }

}
