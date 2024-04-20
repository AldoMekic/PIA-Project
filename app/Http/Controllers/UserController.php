<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Add this import for logging


class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'birthplace' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'jmbg' => 'required|string|max:13',
            'phone_num' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
    
        try {
            $user = new User([
                'username' => $request->username,
                'name' => $request->name,
                'surname' => $request->surname,
                'gender' => $request->gender,
                'birthplace' => $request->birthplace,
                'date_of_birth' => $request->date_of_birth,
                'jmbg' => $request->jmbg,
                'phone_num' => $request->phone_num,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash the password
            ]);

            Log::info('Attempting to create user with username: ' . $request->username);
    
            $user->save(); // Ensure the user is saved

            Log::info('User created successfully: ' . $user->username);
            return redirect()->route('profile')->with('success', 'Registration successful.'); // Redirect to Profile
        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return redirect()->route('register')->withErrors(['error' => 'User creation failed. Please try again.']);
        }
    }

    public function getUserById($userId)
    {
        $user = User::find($userId); 
        return $user;
    }
}