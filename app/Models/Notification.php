<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $primaryKey = 'notificationId';

    protected $fillable = ['type', 'from', 'content', 'user_id', 'moderator_id', 'admin_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'userId');
    }

    public function moderator()
    {
        return $this->belongsTo(Moderator::class, 'moderator_id', 'moderatorId');
    }

    public function administrator()
    {
        return $this->belongsTo(Administrator::class, 'admin_id', 'adminId');
    }
}