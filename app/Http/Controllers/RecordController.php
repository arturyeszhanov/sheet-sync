<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        return view('records.index', compact('records'));
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

