<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeratorTheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'moderator_id',
        'theme_id',
    ];

    // Define the relationships (optional, but useful)
    public function moderator()
    {
        return $this->belongsTo(Moderator::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
