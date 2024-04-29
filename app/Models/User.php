<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;  // Adds notification capabilities which is useful for sending password reset emails etc.

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
        'password' 
    ];
}