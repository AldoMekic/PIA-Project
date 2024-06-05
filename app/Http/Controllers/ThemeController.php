<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function follow($themeId)
    {
        $theme = Theme::findOrFail($themeId);
        $user = Auth::user();
        
        if ($user->themes->contains($theme->themeId)) {
            $user->themes()->detach($theme); // Unfollow functionality
        } else {
            $user->themes()->attach($theme); // Follow functionality
        }

        return redirect()->back();
    }
}