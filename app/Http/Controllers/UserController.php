<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function makeAdmin($id) {
        $user = User::find($id);
        $user->roles = 'Admin';
        $user->save();
        return redirect('user');
    }

    public function removeAdmin($id) {
        $user = User::find($id);
        $user->roles = null;
        $user->save();
        return redirect('user');
    }
}
