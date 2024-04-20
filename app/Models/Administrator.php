<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;

    protected $table = 'administrators';
    protected $primaryKey = 'adminId';

    protected $fillable = [
        'name', 'surname', 'gender', 'birthplace', 'date_of_birth', 'jmbg', 'phone_num', 'email'
    ];
}
