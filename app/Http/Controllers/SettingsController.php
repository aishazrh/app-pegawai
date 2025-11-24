<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // Ambil session theme & language, default kalau belum ada
        $theme = session('theme', 'light');
        $language = session('language', 'id');

        return view('settings.index', compact('theme', 'language'));
    }

    public function updateTheme(Request $request)
    {
        session(['theme' => $request->theme]);
        return back();
    }

    public function updateLanguage(Request $request)
    {
        session(['language' => $request->language]);
        return back();
    }
}
