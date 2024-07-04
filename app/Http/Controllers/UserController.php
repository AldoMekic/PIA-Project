<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\UserSaved;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\UserPassword;

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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'surname' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'gender' => 'required|in:M,F',
            'birthplace' => 'required|string|max:255',
            'date_of_birth' => ['required', 'date', function($attribute, $value, $fail) {
                if (Carbon::parse($value)->isFuture()) {
                    $fail('Your date of birth can\'t be in the future.');
                }
                if (Carbon::parse($value)->age < 14) {
                    $fail('You are under 14 years of age.');
                }
            }],
            'jmbg' => 'required|string|max:13',
            'phone_num' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'regex:/[A-Z]/', 'regex:/[!@#$%^&*(),.?":{}|<>]/'],
        ], [
            'name.regex' => 'You can only use letters of the alphabet for a name.',
            'surname.regex' => 'You can only use letters of the alphabet for a surname.',
            'password.regex' => 'The password needs to be 8 characters long, have one capital letter and one symbol.',
            'password.min' => 'Your password isn\'t 8 or more characters long (spacebars are not counted).'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Generate username
        $username = strtolower($request->input('name') . $request->input('surname'));

        // Check if the username already exists
        if (User::where('username', $username)->exists()) {
            return back()->withErrors([
                'username' => 'This username already exists.'
            ])->withInput();
        }

        // Create the user
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

    // Retrieve the current password record
    $passwordRecord = UserPassword::where('user_id', $user->id)->first();

    // Check if a password record exists for the user
    if (!$passwordRecord) {
        return back()->withErrors(['password' => 'Password record not found for this user.']);
    }

    // Check if new password matches current or previous passwords
    if (Hash::check($newPassword, $passwordRecord->first_pass) || Hash::check($newPassword, $passwordRecord->second_pass)) {
        return back()->withErrors(['password' => 'The new password cannot be the same as your current or previous passwords.']);
    }

    // Update the passwords
    $passwordRecord->second_pass = $passwordRecord->first_pass; // Move current to previous
    $passwordRecord->first_pass = Hash::make($newPassword); // Set new password
    $passwordRecord->save();

    // Update user's password in the users table
    $user->password = Hash::make($newPassword);
    $user->save();

    return redirect()->route('profile.settings')->with('success', 'Password successfully changed.');
}

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        // Delete all posts by the user
        Post::where('user_id', $user->userId)->delete();

        // Delete all saved posts by the user
        UserSaved::where('user_id', $user->userId)->delete();

        // Remove user from all followed themes
        DB::table('theme_user')->where('user_id', $user->userId)->delete();

        // Delete all notifications for the user
        DB::table('notification_user')->where('user_id', $user->userId)->delete();

        // Delete user passwords
        DB::table('user_passwords')->where('user_id', $user->userId)->delete();

        // Finally, delete the user
        $user->delete();

        // Log out the user
        Auth::logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the welcome page
        return redirect()->route('welcome')->with('success', 'Account deleted successfully.');
    }
}