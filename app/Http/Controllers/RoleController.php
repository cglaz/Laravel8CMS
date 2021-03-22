<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{

    public function view()
    {
        return view('admin.roles.roles', ['roles' => Role::all()]);
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'unique:roles'],
        ]);

        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        session()->flash('create', 'Role has been created');
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('destroy', 'Role: ' . $role->name . ' has been deleted');
        return back();
    }
}
