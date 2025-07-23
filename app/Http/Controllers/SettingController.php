<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
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

        return redirect()->back()->with('success', 'Google Sheet URL updated successfully.');
    }
}

