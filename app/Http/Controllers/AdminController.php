<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function viewUsers(){
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function createUser(){
        return view('users.create');
    }

    public function editUser(Request $request){
        $user = User::findOrFail($request->id);
        return view('users.edit', ['user'=>$user]);
    }

    public function updateUser(Request $request){

        $request->validate([
            'name'=>'required|max:60',
            'email'=>'required|email',
            'password'=>'required|min:5|max:20',
            'role'=>'required|max:1'
        ]);

        $user = User::findOrFail($request->id);

        $user->name  = $request->name;
        $user->email  = $request->email;
        $user->password  = Hash::make($request->password);
        $user->type = $request->role;
        $user->save();
        return redirect('/users');
    }

    public function storeUser(Request $request){

        $request->validate([
            'name'=>'required|max:60',
            'email'=>'required|email',
            'password'=>'required|min:5|max:20',
            'role'=>'required|max:1'
        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'type'=> $request->role
        ]);

        $user->save();

        return redirect('/users');
    }

    public function deleteUser(Request $request){

        $user = User::findOrFail($request->id);

        $user->delete();

        return redirect('/users');
    }
}
