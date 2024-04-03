<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EspaceController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('espace', compact('users'));
    }
}
