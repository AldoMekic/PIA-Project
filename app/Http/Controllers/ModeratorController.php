<?php

namespace App\Http\Controllers;

use App\Models\Moderator;

class ModeratorController extends Controller
{
    public function getModeratorById($moderatorId)
    {
        $moderator = Moderator::find($moderatorId);
        return $moderator;
    }
}