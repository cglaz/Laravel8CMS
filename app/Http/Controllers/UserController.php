<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function view()
    {

        $users = User::all();
        return view('admin.users.users', ['users' => $users]);
    }
}
