<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class Configcontroller extends Controller
{
    public function index()
    {
        $configurations = Configuration::paginate(5);
        return view('config.index', compact('configurations'));
    }

}
