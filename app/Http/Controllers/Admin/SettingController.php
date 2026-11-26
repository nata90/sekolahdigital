<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private array $fields = [
        'wa_number' => 'string',
        'wa_message_default' => 'string',
        'hero_headline' => 'string',
        'hero_subheadline' => 'string',
        'hero_badge' => 'string',
        'about_intro' => 'string',
        'about_story' => 'string',
        'meta_title' => 'string',
        'meta_description' => 'string',
    ];

    public function edit()
    {
        $settings = Setting::whereIn('key', array_keys($this->fields))
            ->pluck('value', 'key')
            ->toArray();

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'wa_number' => 'required|string|max:30',
            'wa_message_default' => 'required|string|max:500',
            'hero_headline' => 'required|string|max:255',
            'hero_subheadline' => 'nullable|string|max:500',
            'hero_badge' => 'nullable|string|max:255',
            'about_intro' => 'nullable|string',
            'about_story' => 'nullable|string',
            'meta_title' => 'nullable|string|max:100',
            'meta_description' => 'nullable|string|max:300',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value ?? '']);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan berhasil disimpan.');
    }
}