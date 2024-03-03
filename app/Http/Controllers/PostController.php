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
}
