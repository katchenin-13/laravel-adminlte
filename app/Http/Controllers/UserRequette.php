<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRequette extends Controller
{
    public function userInfo()
    {
        $user = Auth::user();
        return response()->json($user);
    }
}
