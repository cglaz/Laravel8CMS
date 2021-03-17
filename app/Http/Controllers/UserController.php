<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view()
    {
        $users = User::orderBy('created_at', 'ASC')->paginate(10);
        return view('admin.users.users', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([

            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255'],
            'avatar' => ['file'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (request('avatar')) {

            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();
    }

    public function destroy(User $user, Request $request)
    {
        $user->delete();
        $request->session()->flash('destroy', 'User: ' . $user->name . ' has been deleted');
        return back();
    }

    public function attach(User $user)
    {
        $user->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));

        return back();
    }
}
