<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $themes = Theme::with('posts')->where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($themes);
    }

    public function show($themeId)
    {
        $theme = Theme::with('posts')->findOrFail($themeId);
        return view('theme', compact('theme'));
    }

    public function news($themeId)
    {
        $theme = Theme::with('news')->findOrFail($themeId);
        return view('themeNews', compact('theme'));
    }

    public function settings($themeId)
    {
        $theme = Theme::findOrFail($themeId);
        return view('themeSettings', compact('theme'));
    }

    public function polls($themeId)
    {
        $theme = Theme::with('polls')->findOrFail($themeId);
        return view('themePolls', compact('theme'));
    }
}