<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Method to create a new comment
    public function createComment(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'content' => 'required|string',
            'likes' => 'integer',
            'dislikes' => 'integer',
        ]);

        $comment = Comment::create([
            'username' => $request->input('username'),
            'content' => $request->input('content'),
            'likes' => $request->input('likes', 0), // default to 0 if not provided
            'dislikes' => $request->input('dislikes', 0), // default to 0 if not provided
        ]);

        return response()->json(['message' => 'Comment created successfully', 'comment' => $comment], 201);
    }

    // Method to get all comments
    public function getAllComments()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    // Method to get a comment by its ID
    public function getCommentById($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }
        return response()->json($comment);
    }

    // Method to update a comment
    public function updateComment(Request $request, $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $request->validate([
            'username' => 'string|max:255',
            'content' => 'string',
            'likes' => 'integer',
            'dislikes' => 'integer',
        ]);

        $comment->username = $request->input('username', $comment->username);
        $comment->content = $request->input('content', $comment->content);
        $comment->likes = $request->input('likes', $comment->likes);
        $comment->dislikes = $request->input('dislikes', $comment->dislikes);
        $comment->save();

        return response()->json(['message' => 'Comment updated successfully', 'comment' => $comment]);
    }

    // Method to delete a comment
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $comment->delete();
        return response()->json(['message' => 'Comment deleted successfully']);
    }
}