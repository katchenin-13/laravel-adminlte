<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Commune;
use App\Models\Coursier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::count();
        $communeCount = Commune::count();
        $coursierCount = Coursier::count();
        $clientCount = Client::count();
        return view('/home', compact('userCount','communeCount','coursierCount','clientCount'));
    }
}
