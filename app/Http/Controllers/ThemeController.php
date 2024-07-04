<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ThemeController extends Controller
{
    public function search(Request $request)
{
    $query = $request->get('query');
    $themes = Theme::where('name', 'LIKE', "%{$query}%")->get();

    return response()->json($themes);
}

public function show($themeId)
{
    $theme = Theme::with(['posts' => function ($query) {
        $query->orderBy('created_at', 'desc');
    }])->findOrFail($themeId);

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

    public function storePost(Request $request, $themeId)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post using the validated data
        $post = new Post;
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->author = Auth::user()->username;
        $post->user_id = Auth::id();
        $post->theme_id = $themeId; // Assign the theme ID
        $post->save();

        // Redirect or return a response
        return redirect()->route('theme.show', ['themeId' => $themeId])->with('success', 'Post created successfully!');
    }
}