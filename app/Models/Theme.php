<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $table = 'themes';
    protected $primaryKey = 'themeId';
    protected $fillable = ['name', 'description', 'followers', 'posts'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'theme_user', 'theme_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'theme_id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'theme_id');
    }

    public function polls()
    {
        return $this->hasMany(Poll::class, 'theme_id');
    }

    public function moderators()
{
    return $this->belongsToMany(Moderator::class, 'moderator_themes', 'theme_id', 'moderator_id');
}
}