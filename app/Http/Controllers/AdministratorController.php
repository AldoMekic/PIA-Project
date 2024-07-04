<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\User;
use App\Models\Moderator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    public function index()
    {
        $users = User::all();
        $moderators = Moderator::with('user')->get();
        $administrators = Administrator::with('user')->get();
        return view('adminPage', compact('users', 'moderators', 'administrators'));
    }

    public function turnModerator($userId)
    {
        $user = User::findOrFail($userId);
        if ($user->isModerator()) {
            return redirect()->back()->withErrors(['error' => 'User is already a moderator.']);
        }
        Moderator::create(['user_id' => $userId]);
        return redirect()->back()->with('success', 'User turned into a moderator successfully.');
    }

    public function turnAdministrator($userId)
    {
        $user = User::findOrFail($userId);
        if ($user->isAdmin()) {
            return redirect()->back()->withErrors(['error' => 'User is already an administrator.']);
        }
        Administrator::create(['user_id' => $userId]);
        return redirect()->back()->with('success', 'User turned into an administrator successfully.');
    }

    public function deleteAccount($userId)
    {
        $user = User::findOrFail($userId);
        Moderator::where('user_id', $userId)->delete();
        Administrator::where('user_id', $userId)->delete();
        $user->delete();
        return redirect()->back()->with('success', 'User account deleted successfully.');
    }

    public function demoteUser($userId)
    {
        $moderator = Moderator::where('user_id', $userId)->first();
        if (!$moderator) {
            return redirect()->back()->withErrors(['error' => 'User is not a moderator.']);
        }
        $moderator->delete();
        return redirect()->back()->with('success', 'User demoted to ordinary user successfully.');
    }

    public function promoteAdministrator($userId)
    {
        $user = User::findOrFail($userId);
        if ($user->isAdmin()) {
            return redirect()->back()->withErrors(['error' => 'User is already an administrator.']);
        }
        Administrator::create(['user_id' => $userId]);
        Moderator::where('user_id', $userId)->delete();
        return redirect()->back()->with('success', 'User promoted to administrator successfully.');
    }
}