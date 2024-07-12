<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FactureController extends Controller
{
    public function send(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('angamane0@gmail.com', 'Boxlogin');

            $message->to('chrisn@scotch.io');

        });


        return response()->json(['message' => 'Request completed']);
    }
}
