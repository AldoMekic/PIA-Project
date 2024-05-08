<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = new \App\Models\Post();
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
    $post->save();

    // Redirect or return a response
    return redirect()->route('some_route_name')->with('success', 'Post created successfully!');
}
}
