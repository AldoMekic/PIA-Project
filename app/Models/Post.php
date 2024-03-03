<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; 

    public function getPostById($postId)
    {
        $post = DB::table($this->table)->where('postID', $postId)->first();
        return $post;
    }
}
