<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Training;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('role:super_admin');  // Ensure only super_admin can access these routes
    }
    public function index()
    {
        $trainings = Training::with(['student', 'trainer', 'admin', 'company'])->get();
        return view('trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::where('role_id', 3)->get();
        $trainers = User::where('role_id', 4)->get();
        $admins = User::where('role_id', 2)->get();
        $companies = Company::all();

        return view('trainings.create', compact('students', 'trainers', 'admins', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $trainer = User::find($request->trainer_id);

        // Ensure the trainer is assigned to a company
        $company_id = $trainer->company_id;

        $training = Training::create([
            'student_id' => $request->student_id,
            'trainer_id' => $request->trainer_id,
            'admin_id' => $request->admin_id,
            'company_id' => $company_id,  // Ensure the training has the correct company ID
        ]);

        // Additional logic if needed...

        return redirect()->route('trainings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $training = Training::find($id);
        $trainer = User::find($training->trainer_id);

        // Set the company_id to match the trainer's company
        $training->company_id = $trainer->company_id;

        return view('trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:users,id',
            'trainer_id' => 'required|exists:users,id',
            'admin_id' => 'required|exists:users,id',
            'company_id' => 'nullable|exists:companies,id',
            'status' => 'required|in:0,1,2',
        ]);

        $training->update($validated);

        return redirect()->route('trainings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->route('trainings.index');
    }
}
