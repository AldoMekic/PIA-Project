<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'content'];

    public static function createPost($title, $author, $content)
    {
        return Post::create([
            'title' => $title,
            'author' => $author,
            'content' => $content,
        ]);
    }

    public static function getAllPosts()
    {
        return Post::all();
    }

    public static function getPostById($id)
    {
        return Post::find($id);
    }

    public static function updatePost($postId, $title, $content)
    {
        $post = Post::find($postId);
        $post->title = $title;
        $post->content = $content;
        $post->save();
        return $post;
    }

    public static function deletePost($postId)
    {
        $post = Post::find($postId);
        $post->delete();
    }
}
