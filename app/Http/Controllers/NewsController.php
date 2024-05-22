<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'theme_id' => 'required|exists:themes,themeId'
        ]);

        News::create([
            'author' => Auth::user()->username,
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'theme_id' => $validatedData['theme_id']
        ]);

        return redirect()->back()->with('success', 'News post created successfully!');
    }
}
