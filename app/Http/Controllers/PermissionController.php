<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function view()
    {
        return view('admin.permissions.permissions', ['permissions' => Permission::all()]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'unique:permissions'],
        ]);

        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        session()->flash('create', 'Permission created');
        return back();
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        session()->flash('destroy', 'Permission: ' . $permission->name . ' has been deleted');
        return back();
    }
}
