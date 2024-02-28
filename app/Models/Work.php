<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'content'];

    public static function createWork($title, $author, $content)
    {
        return Work::create([
            'title' => $title,
            'author' => $author,
            'content' => $content,
        ]);
    }

    public static function getAllWorks()
    {
        return Work::all();
    }

    public static function getWorkById($id)
    {
        return Work::find($id);
    }

    public static function updateWork($workId, $title, $content)
    {
        $work = Work::find($workId);
        $work->title = $title;
        $work->content = $content;
        $work->save();
        return $work;
    }

    public static function deleteWork($workId)
    {
        $work = Work::find($workId);
        $work->delete();
    }
}
