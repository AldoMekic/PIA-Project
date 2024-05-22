<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $primaryKey = 'newsId';
    protected $fillable = ['author', 'title', 'content', 'theme_id'];

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }
}
