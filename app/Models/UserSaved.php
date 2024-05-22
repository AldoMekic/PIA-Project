<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSaved extends Model
{
    use HasFactory;

    protected $table = 'user_saved'; // Specify the table name if it's not the plural form of the model name

    // Columns that are mass assignable
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'userId'); // Adjust the foreign key and local key if necessary
    }

    // Define the relationship with the Post model
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'postID'); // Adjust the foreign key and local key if necessary
    }
}