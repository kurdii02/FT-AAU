<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUserForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;
    public $companies = [];
    public $company_id = null;
    public $roles;
    public $trainerRoleId;


public function mount(){
    $this->trainerRoleId = Role::where('name', 'trainer')->value('id');
    $this->companies = [];
}
    public function updatedRole()
    {


        if ($this->role == $this->trainerRoleId) {

            $this->companies = Company::all();
        } else {
            $this->companies = [];
            $this->company_id = null;
        }
    }

    public function save()
    {
        try {

            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'role' => 'required|exists:roles,id',
                'company_id' => 'nullable|exists:companies,id',
            ]);


            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role_id' => $this->role,
                'company_id' => $this->role == 4 ? $this->company_id : null,
            ]);


            session()->flash('message', 'User created successfully!');


            $this->reset(['name', 'email', 'password', 'role', 'company_id']);
        } catch (\Exception $e) {

            session()->flash('error', 'Error creating user: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.create-user-form');
    }
}

