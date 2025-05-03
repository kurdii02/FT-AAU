<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Training;
use App\Models\User;
use Livewire\Component;

class TrainingForm extends Component
{
    public $students;
    public $admins;
    public $trainers;
    public $companies;
    public $selectedStudent;
    public $selectedAdmin;
    public $selectedTrainer;
    public $selectedCompany;
    public $status = 1;

    public function mount()
    {
        $this->companies = Company::all();
        $this->students = User::where('role_id', 3)->get();
        $this->admins = User::where('role_id', 2)->get();

    }


    public function updatedSelectedCompany($companyId)
    {
        $this->trainers = User::where('company_id', $companyId)
            ->where('role_id', 4)
            ->get();
    }

    public function save()
    {

        try {
            $this->validate([
                'selectedStudent' => 'required|exists:users,id',
                'selectedAdmin' => 'required|exists:users,id',
                'selectedTrainer' => 'required|exists:users,id',
                'selectedCompany' => 'required|exists:companies,id',
                'status' => 'required|boolean',
            ]);

            Training::create([
                'student_id' => $this->selectedStudent,
                'admin_id' => $this->selectedAdmin,
                'trainer_id' => $this->selectedTrainer,
                'status' => $this->status,
                'company_id' => $this->selectedCompany,
            ]);

            // Flash a success message
            session()->flash('message', 'Training process created successfully!');
        } catch (\Exception $e) {
            // Flash an error message
            session()->flash('error', 'Error creating training: ' . $e->getMessage());
        }



    }

    public function render()
    {
        return view('livewire.training-form');
    }
}
