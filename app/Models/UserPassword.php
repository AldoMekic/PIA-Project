<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPassword extends Model
{
    protected $table = 'user_passwords'; // Specify the table name if not matching the plural of class name

    protected $primaryKey = 'passwordId'; // Set the primary key if it's not 'id'

    protected $fillable = [
        'user_id',
        'first_pass',
        'second_pass'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * User relationship - linking back to the user model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'userId'); // Ensure the foreign key and owner key are correctly defined
    }
}