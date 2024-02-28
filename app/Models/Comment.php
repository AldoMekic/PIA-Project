<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'content'];

    public static function createComment($title, $author, $content)
    {
        return Comment::create([
            'title' => $title,
            'author' => $author,
            'content' => $content,
        ]);
    }

    public static function getAllComments()
    {
        return Comment::all();
    }

    public static function getCommentById($id)
    {
        return Comment::find($id);
    }

    public static function updateComment($commentId, $title, $content)
    {
        $comment = Comment::find($commentId);
        $comment->title = $title;
        $comment->content = $content;
        $comment->save();
        return $comment;
    }

    public static function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
    }
}
