<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function showUser(){

        $users = User::all();

        return view('auth.admin.quanlyuser', compact('users'));
    }

    public function editUserRole(User $user){
        return view('auth.admin.edituserrole',compact('user'));
    }

    public function updateUserRole(Request $request, User $user){
        $user->role = $request->role;
        $user->save();
        return redirect()->route('admin.quanly');
}
}
