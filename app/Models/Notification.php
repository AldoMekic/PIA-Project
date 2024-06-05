<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $primaryKey = 'notificationId';

    protected $fillable = ['type', 'from', 'content', 'moderator_id', 'admin_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'notification_user', 'notification_id', 'user_id');
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