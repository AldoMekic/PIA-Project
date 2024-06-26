<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; 

    protected $primaryKey = 'postID'; // Ensure the primary key is correctly defined

    public function getPostById($postId)
    {
        return DB::table($this->table)->where('postID', $postId)->first();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }
}