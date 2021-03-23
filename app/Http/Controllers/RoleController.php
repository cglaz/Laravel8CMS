<?php

namespace App\Http\Controllers;

use App\Models\Permission;
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
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()]);
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

    public function update(Role $role)
    {
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');

        if ($role->isDirty('name')) {
            session()->flash('update', 'Role: ' . $role->name . ' has been updated');

            $role->save();
        } else {
            session()->flash('update', 'Nothing has been updated');

        }

        return back();
    }
}
