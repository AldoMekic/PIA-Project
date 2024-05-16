<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPassword; // Assuming you have a model for the user_passwords table
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string|max:255',
        'password' => 'required|string|min:8',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('profile')->with('success', 'Login successful.');
    }

    return back()->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ]);
}

public function register(Request $request)
{
    $request->validate([
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

    // Generate username
    $username = strtolower($request->input('name') . $request->input('surname'));

    $user = new User([
        'username' => $username,
        'name' => $request->input('name'),
        'surname' => $request->input('surname'),
        'gender' => $request->input('gender'),
        'birthplace' => $request->input('birthplace'),
        'date_of_birth' => $request->input('date_of_birth'),
        'jmbg' => $request->input('jmbg'),
        'phone_num' => $request->input('phone_num'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    $user->save(); // Save the user to the database
    Auth::login($user);
    return redirect()->route('profile')->with('success', 'Registration successful.');
}

public function logout(Request $request)
{
    Auth::logout();  // Log the user out of the application.

    $request->session()->invalidate();  // Invalidate the session.
    $request->session()->regenerateToken();  // Regenerate the CSRF token.

    return redirect('/');  // Redirect to homepage or login page.
}

    public function getUserById($userId)
    {
        $user = User::find($userId); 
        return $user;
    }

    

public function changePassword(Request $request)
{
    $request->validate([
        'password' => 'required|string|min:8',
    ]);

    $user = Auth::user();
    $newPassword = $request->input('password');
    $passwordRecord = UserPassword::where('user_id', $user->userId)->first();

    if (Hash::check($newPassword, $passwordRecord->first_pass) || Hash::check($newPassword, $passwordRecord->second_pass)) {
        return back()->withErrors(['password' => 'The new password cannot be the same as your current or previous passwords.']);
    }

    // Update the passwords
    $passwordRecord->second_pass = $passwordRecord->first_pass; // Move current to previous
    $passwordRecord->first_pass = Hash::make($newPassword); // Set new password
    $passwordRecord->save();

    // Update user's password
    $user->password = Hash::make($newPassword);
    $user->save();

    return redirect()->route('profile.settings')->with('success', 'Password successfully changed.');
}
}