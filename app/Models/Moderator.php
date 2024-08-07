<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    protected $table = 'moderators';
    protected $primaryKey = 'moderatorId'; 

    protected $fillable = [
         'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'moderator_themes', 'moderator_id', 'theme_id');
    }
}