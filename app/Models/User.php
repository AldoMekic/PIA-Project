<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'userId';

    protected $fillable = [
        'username',
        'name',
        'surname',
        'gender',
        'birthplace',
        'date_of_birth',
        'jmbg',
        'phone_num',
        'email',
        'password',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'theme_user', 'user_id', 'theme_id');
    }

    public function notifications()
    {
        return $this->belongsToMany(Notification::class, 'notification_user', 'user_id', 'notification_id');
    }

    public function isModerator()
    {
        return $this->hasOne(Moderator::class, 'user_id')->exists();
    }

    public function isAdmin()
    {
        return $this->hasOne(Administrator::class, 'user_id')->exists();
    }

    public function isModeratorOrAdmin()
    {
        return $this->isModerator() || $this->isAdmin();
    }
}