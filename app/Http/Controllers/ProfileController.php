<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;  // Assuming Post model is used
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function info()
    {
        return view('profileInfo');
    }

    public function posts()
    {
        $posts = Post::where('user_id', auth()->id())->get(); // Fetch user posts
        return view('components.profile_posts', compact('posts'));
    }

    public function saved()
    {
        $savedPosts = Post::where('is_saved', true)->where('user_id', auth()->id())->get(); // Fetch saved posts
        return view('components.profile_saved', compact('savedPosts'));
    }

    public function settings()
    {
        return view('profileSettings');
    }

    public function works()
    {
        $works = Work::where('user_id', auth()->id())->get(); // Fetch works
        return view('components.profile_works', compact('works'));
    }

    public function themes()
    {
        $followedThemes = Auth::user()->themes;
        return view('profileThemes', compact('followedThemes'));
    }
}