<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModeratorController extends Controller
{
    public function index()
    {
        $moderatorId = Auth::id();
        $themes = Theme::whereHas('moderators', function ($query) use ($moderatorId) {
            $query->where('moderator_id', $moderatorId);
        })->get();

        return view('moderatorThemesPage', compact('themes'));
    }

    public function createTheme(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Create new theme
        $theme = new Theme();
        $theme->name = $request->input('name');
        $theme->description = $request->input('description');
        $theme->save();

        // Attach theme to moderator
        $moderatorId = Auth::id();
        ModeratorTheme::create([
            'moderator_id' => $moderatorId,
            'theme_id' => $theme->id,
        ]);

        return redirect()->route('moderator.themes')->with('success', 'Theme created successfully.');
    }

    public function showThemeUsers($themeId)
    {
        // Check if the moderator has access to this theme
        $theme = Theme::find($themeId);
        if (!$theme) {
            abort(404); // Or handle this scenario as per your application's logic
        }

        // Fetch users related to the theme
        $users = $theme->users()->get();

        return view('themeUsersPage', compact('theme', 'users'));
    }

    public function showThemeDetails($themeId)
    {
        // Check if the moderator has access to this theme
        $theme = Theme::find($themeId);
        if (!$theme) {
            abort(404); // Or handle this scenario as per your application's logic
        }

        return view('themeDetailsComponent', compact('theme'));
    }

    public function showThemePosts($themeId)
    {
        // Check if the moderator has access to this theme
        $theme = Theme::find($themeId);
        if (!$theme) {
            abort(404); // Or handle this scenario as per your application's logic
        }

        // Fetch posts related to the theme
        $posts = $theme->posts()->get();

        return view('themePostsPage', compact('theme', 'posts'));
    }

    public function deleteTheme($themeId)
    {
        $moderatorId = Auth::id();

        // Ensure moderator has access to this theme
        $moderatorTheme = ModeratorTheme::where('moderator_id', $moderatorId)
                                        ->where('theme_id', $themeId)
                                        ->first();

        if (!$moderatorTheme) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized to delete this theme.']);
        }

        // Delete moderator's association with the theme
        ModeratorTheme::where('moderator_id', $moderatorId)
                      ->where('theme_id', $themeId)
                      ->delete();

        return redirect()->back()->with('success', 'Theme deleted successfully.');
    }
}

