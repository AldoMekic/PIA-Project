<?php

namespace App\Http\Controllers;

use App\Models\Administrator;

class AdministratorController extends Controller
{
    public function getAdministratorById($adminId)
    {
        $administrator = Administrator::find($adminId);
        return $administrator;
    }
}
