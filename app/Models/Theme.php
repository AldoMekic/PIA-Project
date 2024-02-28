<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public static function createTheme($name, $description)
    {
        return Theme::create([
            'name' => $name,
            'description' => $description,
        ]);
    }

    public static function getAllThemes()
    {
        return Theme::all();
    }

    public static function getThemeById($id)
    {
        return Theme::find($id);
    }

    public static function updateTheme($themeId, $name, $description)
    {
        $theme = Theme::find($themeId);
        $theme->name = $name;
        $theme->description = $description;
        $theme->save();
        return $theme;
    }

    public static function deleteTheme($themeId)
    {
        $theme = Theme::find($themeId);
        $theme->delete();
    }
}
