<?php

namespace App\Http\Controllers;

use App\Models\Permission;

class PermissionController extends Controller
{
    public function view()
    {
        return view('admin.permissions.permissions', ['permissions' => Permission::all()]);
    }

    public function store()
    {
        dd(request('name'));
    }
}
