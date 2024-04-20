<?php

namespace App\Http\Controllers;

use App\Models\Theme;

class ThemeController extends Controller
{
    public function getThemeById($themeId)
    {
        $theme = Theme::with(['users', 'posts'])->find($themeId);
        return $theme;
    }
}
