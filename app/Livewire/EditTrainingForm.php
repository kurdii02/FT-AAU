<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Training;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class EditTrainingForm extends Component
{
    use WithFileUploads;
    public $training;
    public $students;
    public $admins;
    public $trainers;
    public $companies;
    public $selectedStudent;
    public $selectedAdmin;
    public $selectedTrainer;
    public $selectedCompany;
    public $status;
    public $notes;
    public $tbook;

    public function mount(Training $training)
    {
        $this->training = $training;
        $this->companies = Company::all();
        $this->students = User::where('role_id', 3)->get();
        $this->admins = User::where('role_id', 2)->get();
        $this->selectedStudent = $training->student_id;
        $this->selectedAdmin = $training->admin_id;
        $this->selectedCompany = $training->company_id;
        $this->selectedTrainer = $training->trainer_id;
        $this->status = $training->status;
        $this->notes = $training->Additional_notes;
        $this->tbook = $training->training_book;

        // Load trainers for the selected company
        if ($this->selectedCompany) {
            $this->trainers = User::where('company_id', $this->selectedCompany)
                ->where('role_id', 4)
                ->get();
        }
    }

    public function loadTrainers()
    {
        if ($this->selectedCompany) {
            $this->trainers = User::where('company_id', $this->selectedCompany)
                ->where('role_id', 4)
                ->get();
        }
    }

    public function updatedSelectedCompany($companyId)
    {
        $this->loadTrainers();
        $this->selectedTrainer = null; // Reset trainer selection
    }

    public function updateTraining()
    {
        try {
            $this->validate([
                'selectedStudent' => 'required|exists:users,id',
                'selectedAdmin' => 'required|exists:users,id',
                'selectedTrainer' => 'required|exists:users,id',
                'selectedCompany' => 'required|exists:companies,id',
                'status' => 'required|boolean',
                'notes' => 'nullable|string|max:255',
                'tbook' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,pdf,docx|max:2048',
            ]);
            if ($this->tbook) {
                $filePath = $this->tbook->store('training_files/Training_book', 'public');
                $this->training->training_book = $filePath;
            }
            $this->training->update([
                'student_id' => $this->selectedStudent,
                'admin_id' => $this->selectedAdmin,
                'trainer_id' => $this->selectedTrainer,
                'status' => $this->status,
                'company_id' => $this->selectedCompany,
                'Additional_notes' => $this->notes
            ]);

            session()->flash('message', 'Training updated successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Error updating training: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.edit-training-form');
    }
}
