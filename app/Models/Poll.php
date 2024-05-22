<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $primaryKey = 'pollId';
    protected $fillable = ['author', 'title', 'optionOne', 'optionTwo', 'optionThree', 'optionFour', 'optionFive', 'numOne', 'numTwo', 'numThree', 'numFour', 'numFive', 'theme_id'];

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }
}
