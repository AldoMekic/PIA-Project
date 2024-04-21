<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'userId'; 

    protected $fillable = [
        'username', // Ensure this field is in fillable
        'name',
        'surname',
        'gender',
        'birthplace',
        'date_of_birth',
        'jmbg',
        'phone_num',
        'email',
        'password' // Add this field to fillable
    ];
}