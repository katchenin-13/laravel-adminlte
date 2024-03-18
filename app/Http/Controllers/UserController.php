<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function espace()
    {
        $users = User::paginate();

        return view('users.espace', compact('users'));
    }

    public function index()
    {

        $users = User::paginate();
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function loadData($id)
    {
        $data= YourModal::find($id);
        return view('users.create',['data'=> $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        $user = new user([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        $user = User::create($request->all());
        $user->save();
    }

    public function show($id)
    {

        $user = user::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = user::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([

            'name'=>'required',
            'email'=> 'required',
            'password'=> 'password',
        ]);

        $user = user::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');


        $user->update();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();

    }

}
