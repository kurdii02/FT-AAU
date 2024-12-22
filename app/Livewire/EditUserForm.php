<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class EditUserForm extends Component
{
    public $userId;
    public $name;
    public $email;
    public $role_id;
    public $company_id;
    public $roles = [];
    public $companies = [];
    public $showCompanySelect = false;

    public function mount($userId)
    {
        $this->userId = $userId;


        $user = User::findOrFail($this->userId);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
        if ($this->role_id == 4) {
            $this->company_id = $user->company_id;
        }

        $this->roles = Role::all();
        $this->companies = Company::all();


        $this->showCompanySelect = $this->role_id == 4;
    }

    public function updatedRoleId()
    {

        $this->showCompanySelect = $this->role_id == 4;


        if (!$this->showCompanySelect) {
            $this->company_id = null;
        }
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'role_id' => 'required|exists:roles,id',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        try {

            $user = User::findOrFail($this->userId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'role_id' => $this->role_id,
                'company_id' => $this->company_id,
            ]);


            session()->flash('message', 'User updated successfully!');
        } catch (\Exception $e) {

            session()->flash('error', 'Error updating user: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.edit-user-form');
    }
}

