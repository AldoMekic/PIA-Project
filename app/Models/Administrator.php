<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'administrators';
    protected $primaryKey = 'adminId';

    protected $fillable = [
        'name', 'surname', 'gender', 'birthplace', 'date_of_birth', 'jmbg', 'phone_num', 'email', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}