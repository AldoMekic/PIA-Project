<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\UserSaved;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $post = new Post();
        $returnedPost = $post->getPostById(1);
        return $returnedPost;
    }

    public function store(Request $request)
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
        $post->theme_id = null;
        $post->save();

        // Redirect or return a response
        return redirect()->route('profile.posts')->with('success', 'Post created successfully!');
    }

    public function userPosts()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('profilePosts', compact('posts'));
    }

    public function savePost(Request $request, $postID)
    {
        $userId = Auth::id();
        $existingSave = UserSaved::where('user_id', $userId)->where('post_id', $postID)->first();

        if (!$existingSave) {
            UserSaved::create([
                'user_id' => $userId,
                'post_id' => $postID,
            ]);
        }

        return redirect()->back()->with('success', 'Post saved successfully!');
    }

    public function savedPosts()
    {
        $userId = Auth::id();
        $savedPosts = UserSaved::where('user_id', $userId)->orderBy('created_at', 'desc')->get()->map(function ($saved) {
            return $saved->post;
        });

        return view('profileSaved', compact('savedPosts'));
    }
}