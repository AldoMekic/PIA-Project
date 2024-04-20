<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    use HasFactory;

    protected $table = 'moderators';
    protected $primaryKey = 'moderatorId'; 

    protected $fillable = [
        'name', 'surname', 'gender', 'birthplace', 'date_of_birth', 'jmbg', 'phone_num', 'email'
    ];
}
