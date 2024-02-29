<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use  HasFactory;

    protected $fillable = ['ime', 'prezime', 'email', 'pol', 'mesto_rodjenja', 'drzava', 'datum', 'jmbg', 'mobilni_telefon'];

    public static function createUser($ime, $prezime, $email, $pol, $mesto_rodjenja, $drzava, $datum, $jmbg, $mobilni_telefon)
    {
        return User::create([
            'ime' => $ime,
            'prezime' => $prezime,
            'email' => $email,
            'pol' => $pol,
            'mesto_rodjenja' => $mesto_rodjenja,
            'drzava' => $drzava,
            'datum' => $datum,
            'jmbg' => $jmbg,
            'mobilni_telefon' => $mobilni_telefon
        ]);
    }

    public static function getAllUsers()
    {
        return User::all();
    }

    public static function getUserById($id)
    {
        return User::find($id);
    }

    public static function updateUser($userId, $ime, $prezime, $email, $pol, $mesto_rodjenja, $drzava, $datum, $jmbg, $mobilni_telefon)
    {
        $user = User::find($userId);
        $user->ime = $ime;
        $user->prezime = $prezime;
        $user->email = $email;
        $user->pol = $pol;
        $user->mesto_rodjenja = $mesto_rodjenja;
        $user->drzava = $drzava;
        $user->datum = $datum;
        $user->jmbg = $jmbg;
        $user->mobilni_telefon = $mobilni_telefon;
        $user->save();
        return $user;
    }

    public static function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();
    }
}
