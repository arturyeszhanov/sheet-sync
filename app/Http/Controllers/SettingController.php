<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function updateSheetUrl(Request $request)
    {
        $request->validate([
            'google_sheet_url' => 'required|url'
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->google_sheet_url = $request->google_sheet_url;
        $setting->save();

        return redirect()->back()->with('success', 'Ссылка на Google Таблицу успешно обновлена.');
    }

    public function deleteSheetUrl(Request $request)
    {
        $setting = Setting::first();

        if ($setting && $setting->google_sheet_url) {
            $setting->google_sheet_url = null;
            $setting->save();
        }

        return redirect()->back()->with('success', 'Ссылка успешно удалена.');
    }

}

