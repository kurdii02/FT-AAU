<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Training;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {

        if (Auth::user()->role->name == "super_admin") {
            $users = User::paginate(5);
        } elseif (Auth::user()->role->name == "admin") {
            $admin = Auth::user();
            $users = Training::where('admin_id', $admin->id)
                ->where('status', 1)
                ->with('student')
                ->get()
                ->pluck('student');
        } elseif (Auth::user()->role->name == "trainer") {
            $trainer = Auth::user();
            $users = Training::where('trainer_id', $trainer->id)
                ->where('status', 1)
                ->with('student')
                ->get()
                ->pluck('student');
        }


        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $companies = Company::all();
        return view('user.create', compact(['roles', 'companies']));
    }




    public function edit(User $user)
    {
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
        ]);


        return redirect()->route('user.index');
    }

    public function show() {}

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    public function updateStatus($id, $status)
    {
        // Only allow super_admin to update status
        if (!auth()->user()->role->name == 'super_admin') {
            return redirect()->route('home')->withErrors(['error' => 'You do not have permission to change user status.']);
        }

        $user = User::findOrFail($id);

        // Change status if valid (0 or 1)
        if ($status == 1 || $status == 0) {
            $user->update([
                'status' => $status
            ]);
        }

        return redirect()->route('user.index')->with('status', 'User status updated successfully!');
    }
}
