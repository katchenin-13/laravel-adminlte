<?php

namespace App\Http\Controllers;

use App\Models\Coursuser;
use App\Models\Coursier;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CoursuserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'selectedCoursiers' => 'required',
            'selectedUser' => 'required',
        ]);

        Coursuser::create([
            'uuid' => Uuid::uuid4()->toString(),
            'coursier_id' => $request->selectedCoursiers,
            'user_id' => $request->selectedUser,
        ]);

        $coursiers = Coursier::whereNotIn('id', Coursuser::pluck('coursier_id'))->get();
        $users = User::whereNotIn('id', Coursuser::pluck('user_id'))->get();

        return response()->json([
            'message' => 'Le coursier a été enregistré avec succès!',
            'coursiers' => $coursiers,
            'users' => $users,
        ]);
    }
}
