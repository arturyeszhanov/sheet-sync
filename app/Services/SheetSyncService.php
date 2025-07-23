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

        // Получаем ID таблицы из settings
        $setting = Setting::first();
        if (!$setting || !Str::contains($setting->google_sheet_url, '/d/')) {
            throw new \Exception('Google Sheet URL is not set or invalid.');
        }
        
        $this->spreadsheetId = Str::between($setting->google_sheet_url, '/d/', '/');
        
    }

    public function exportAllowedRecords()
    {
        $records = Record::allowed()->get();

        $values = [];
        $header = ['ID', 'Text', 'Status']; // +1 столбец комментариев будет уже в таблице

        $values[] = $header;

        foreach ($records as $record) {
            $values[] = [
                $record->id,
                $record->text,
                $record->status,
            ];
        }

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        // Загружаем данные в таблицу начиная с A1
        $range = 'A1';
        $this->service->spreadsheets_values->update(
            $this->spreadsheetId,
            $range,
            $body,
            $params
        );
    }
}
