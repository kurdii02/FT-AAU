<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles',
        ]);

        Role::create(
            [
                'name' => $data['name'],
            ]
        );
        return redirect()->route('role.index');
    }

    public function edit(Role $role){
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, Role $role){
        $data = $request->validate([
            'name' => 'required|unique:roles',
        ]);
        $role->update([
            'name' => $data['name'],
        ]);
        return redirect()->route('role.index');
    }
    public function destroy(Role $role){
        $role->delete();
        return redirect()->route('role.index');
    }
}
