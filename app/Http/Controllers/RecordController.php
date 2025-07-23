<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Setting;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function generate()
    {
        $total = 1000;
        $allowedCount = $total / 2;
        $prohibitedCount = $total / 2;

        // Очистим таблицу перед генерацией, если нужно
        // Record::truncate();

        // Генерируем Allowed
        for ($i = 0; $i < $allowedCount; $i++) {
            Record::create([
                'text' => 'Generated allowed text ' . ($i + 1),
                'status' => 'Allowed',
            ]);
        }

        // Генерируем Prohibited
        for ($i = 0; $i < $prohibitedCount; $i++) {
            Record::create([
                'text' => 'Generated prohibited text ' . ($i + 1),
                'status' => 'Prohibited',
            ]);
        }

        return redirect()->back()->with('success', 'Успешно сгенерировано 1000 записей.');
    }

    public function clear()
    {
        Record::truncate();
        return redirect()->back()->with('success', 'Все записи успешно удалены.');
    }



    public function index()
    {
        $records = Record::all();
        $sheetUrl = \App\Models\Setting::value('google_sheet_url');

        return view('records.index', compact('records', 'sheetUrl'));
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string',
            'status' => 'required|in:Allowed,Prohibited',
        ]);

        Record::create($validated);
        return redirect()->route('records.index')->with('success', 'Запись добавлена.');
    }

    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }

    public function update(Request $request, Record $record)
    {
        $validated = $request->validate([
            'text' => 'required|string',
            'status' => 'required|in:Allowed,Prohibited',
        ]);

        $record->update($validated);
        return redirect()->route('records.index')->with('success', 'Запись обновлена.');
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('records.index')->with('success', 'Запись удалена.');
    }
}

