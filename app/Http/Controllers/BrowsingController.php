<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class BrowsingController extends Controller
{
    public function index()
    {
        // Fetch the themes (you can adjust the number and criteria as needed)
        $themes = Theme::all(); // Fetch all themes for simplicity

        return view('browsingPage', compact('themes'));
    }
}
