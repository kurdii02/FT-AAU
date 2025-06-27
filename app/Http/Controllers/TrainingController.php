<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Training;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role->name == "super_admin") {
            $trainings = Training::with(['student', 'trainer', 'admin', 'company'])->get();
        } elseif (Auth::user()->role->name == "admin") {
            $trainings = Training::with(['student', 'trainer', 'admin', 'company'])
                ->where('admin_id', Auth::id())
                ->get();
        } elseif (Auth::user()->role->name == "trainer") {
            $trainings = Training::with(['student', 'trainer', 'admin', 'company'])
                ->where('trainer_id', Auth::id())
                ->get();
        } elseif (Auth::user()->role->name == "student") {
            $trainings = Training::with(['student', 'trainer', 'admin', 'company'])
                ->where('student_id', Auth::id())
                ->get();
        }

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

    public function addDetailsPage($id)
    {
        $training = Training::with(['student', 'trainer', 'admin', 'company'])->findOrFail($id);

        // Check access permissions
        $hasAccess = Auth::user()->role->name === 'super_admin' ||
            Auth::user()->role->name === 'admin' ||
            Auth::user()->role->name === 'trainer' ||
            Auth::user()->id === $training->admin_id ||
            Auth::user()->id === $training->trainer_id ||
            Auth::user()->id === $training->student_id;

        if (!$hasAccess) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        // Decode JSON files for display
        $training->admin_files = $training->admin_files ? json_decode($training->admin_files, true) : [];
        $training->trainer_files = $training->trainer_files ? json_decode($training->trainer_files, true) : [];

        return view('trainings.details', compact('training'));
    }

    /**
     * Handle file uploads based on user role
     */
    public function addDetails(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        // Check access permissions - Fixed logic
        $hasAccess = Auth::user()->role->name === 'super_admin' ||
            Auth::user()->role->name === 'admin' ||
            Auth::user()->role->name === 'trainer' ||
            Auth::user()->id === $training->admin_id ||
            Auth::user()->id === $training->trainer_id;

        if (!$hasAccess) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        // Determine user role and validate accordingly
        if (
            Auth::user()->role->name === 'super_admin' ||
            Auth::user()->role->name === 'admin' ||
            Auth::user()->id === $training->admin_id
        ) {
            return $this->handleAdminUpload($request, $training);
        } elseif (
            Auth::user()->role->name === 'trainer' ||
            Auth::user()->id === $training->trainer_id
        ) {
            return $this->handleTrainerUpload($request, $training);
        }

        return redirect()->back()->with('error', 'Unauthorized access');
    }

    /**
     * Handle admin file uploads
     */
    private function handleAdminUpload(Request $request, $training)
    {
        $request->validate([
            'training_materials.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,txt,zip,jpeg,png,jpg,gif,svg,webp'
        ]);

        // Handle training materials
        if ($request->hasFile('training_materials')) {
            $adminFiles = $training->admin_files ? json_decode($training->admin_files, true) : [];

            foreach ($request->file('training_materials') as $file) {
                $path = $file->store('training_files/admin_materials', 'public');
                $adminFiles[] = [
                    'id' => Str::uuid(),
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'uploaded_at' => now()->toDateTimeString(),
                    'size' => $file->getSize(),
                    'type' => $file->getClientMimeType()
                ];
            }

            $training->admin_files = json_encode($adminFiles);
        }

        $training->save();
        return redirect()->route('trainings.index')->with('success', 'Admin files uploaded successfully');
    }

    /**
     * Handle trainer file uploads
     */
    private function handleTrainerUpload(Request $request, $training)
    {
        $request->validate([
            'trainer_materials.*' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,txt,zip,jpeg,png,jpg,gif,svg,webp'
        ]);

        $trainerFiles = $training->trainer_files ? json_decode($training->trainer_files, true) : [];

        foreach ($request->file('trainer_materials') as $file) {
            $path = $file->store('training_files/trainer_materials', 'public');
            $trainerFiles[] = [
                'id' => Str::uuid(),
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'uploaded_at' => now()->toDateTimeString(),
                'size' => $file->getSize(),
                'type' => $file->getClientMimeType()
            ];
        }

        $training->trainer_files = json_encode($trainerFiles);
        $training->save();

        return redirect()->route('trainings.index')->with('success', 'Trainer files uploaded successfully');
    }

    /**
     * Upload admin files (separate endpoint for admin-specific uploads)
     */
    public function uploadAdminFiles(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        // Check if user is admin or super_admin
        if (
            Auth::user()->role->name !== 'super_admin' &&
            Auth::user()->role->name !== 'admin' &&
            Auth::user()->id !== $training->admin_id
        ) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $request->validate([
            'training_materials.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,txt,zip,jpeg,png,jpg,gif,svg,webp'
        ]);

        // Handle training materials
        if ($request->hasFile('training_materials')) {
            $adminFiles = $training->admin_files ? json_decode($training->admin_files, true) : [];

            foreach ($request->file('training_materials') as $file) {
                $path = $file->store('training_files/admin_materials', 'public');
                $adminFiles[] = [
                    'id' => Str::uuid(),
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'uploaded_at' => now()->toDateTimeString(),
                    'size' => $file->getSize(),
                    'type' => $file->getClientMimeType()
                ];
            }

            $training->admin_files = json_encode($adminFiles);
        }

        $training->save();
        return redirect()->back()->with('success', 'Files uploaded successfully');
    }

    /**
     * Upload trainer files (separate endpoint for trainer-specific uploads)
     */
    public function uploadTrainerFiles(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        // Check if user is trainer or super_admin
        if (
            Auth::user()->role->name !== 'super_admin' &&
            Auth::user()->role->name !== 'trainer' &&
            Auth::user()->id !== $training->trainer_id
        ) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $request->validate([
            'trainer_materials.*' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,txt,zip,jpeg,png,jpg,gif,svg,webp'
        ]);

        $trainerFiles = $training->trainer_files ? json_decode($training->trainer_files, true) : [];

        foreach ($request->file('trainer_materials') as $file) {
            $path = $file->store('training_files/trainer_materials', 'public');
            $trainerFiles[] = [
                'id' => Str::uuid(),
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'uploaded_at' => now()->toDateTimeString(),
                'size' => $file->getSize(),
                'type' => $file->getClientMimeType()
            ];
        }

        $training->trainer_files = json_encode($trainerFiles);
        $training->save();

        return redirect()->back()->with('success', 'Files uploaded successfully');
    }

    /**
     * Download file
     */
    public function downloadFile($trainingId, $fileId)
    {
        $training = Training::findOrFail($trainingId);

        // Check access permissions - Include super_admin
        if (
            Auth::user()->role->name !== 'super_admin' &&
            Auth::user()->role->name !== 'admin' &&
            Auth::user()->role->name !== 'trainer' &&
            Auth::user()->id !== $training->admin_id &&
            Auth::user()->id !== $training->trainer_id &&
            Auth::user()->id !== $training->student_id
        ) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        // Search in admin files
        if ($training->admin_files) {
            $adminFiles = json_decode($training->admin_files, true);
            foreach ($adminFiles as $file) {
                if ($file['id'] === $fileId) {
                    if (Storage::disk('public')->exists($file['path'])) {
                        return Storage::disk('public')->download($file['path'], $file['name']);
                    } else {
                        return redirect()->back()->with('error', 'File not found on disk');
                    }
                }
            }
        }

        // Search in trainer files
        if ($training->trainer_files) {
            $trainerFiles = json_decode($training->trainer_files, true);
            foreach ($trainerFiles as $file) {
                if ($file['id'] === $fileId) {
                    if (Storage::disk('public')->exists($file['path'])) {
                        return Storage::disk('public')->download($file['path'], $file['name']);
                    } else {
                        return redirect()->back()->with('error', 'File not found on disk');
                    }
                }
            }
        }

        return redirect()->back()->with('error', 'File not found');
    }

    /**
     * Delete file
     */
    public function deleteFile($trainingId, $fileId)
    {
        $training = Training::findOrFail($trainingId);

        // Check access permissions - Include super_admin
        if (
            Auth::user()->role->name !== 'super_admin' &&
            Auth::user()->role->name !== 'admin' &&
            Auth::user()->role->name !== 'trainer' &&
            Auth::user()->id !== $training->admin_id &&
            Auth::user()->id !== $training->trainer_id
        ) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $fileDeleted = false;

        // Search and delete from admin files
        if ($training->admin_files) {
            $adminFiles = json_decode($training->admin_files, true);
            foreach ($adminFiles as $key => $file) {
                if ($file['id'] === $fileId) {
                    // Check if user can delete admin files - Include super_admin
                    if (
                        Auth::user()->role->name === 'super_admin' ||
                        Auth::user()->role->name === 'admin' ||
                        Auth::user()->id === $training->admin_id
                    ) {
                        if (Storage::disk('public')->exists($file['path'])) {
                            Storage::disk('public')->delete($file['path']);
                        }
                        unset($adminFiles[$key]);
                        $training->admin_files = json_encode(array_values($adminFiles));
                        $fileDeleted = true;
                        break;
                    } else {
                        return redirect()->back()->with('error', 'You cannot delete admin files');
                    }
                }
            }
        }

        // Search and delete from trainer files
        if (!$fileDeleted && $training->trainer_files) {
            $trainerFiles = json_decode($training->trainer_files, true);
            foreach ($trainerFiles as $key => $file) {
                if ($file['id'] === $fileId) {
                    // Check if user can delete trainer files - Include super_admin
                    if (
                        Auth::user()->role->name === 'super_admin' ||
                        Auth::user()->role->name === 'trainer' ||
                        Auth::user()->id === $training->trainer_id ||
                        Auth::user()->role->name === 'admin'
                    ) {
                        if (Storage::disk('public')->exists($file['path'])) {
                            Storage::disk('public')->delete($file['path']);
                        }
                        unset($trainerFiles[$key]);
                        $training->trainer_files = json_encode(array_values($trainerFiles));
                        $fileDeleted = true;
                        break;
                    }
                }
            }
        }

        if ($fileDeleted) {
            $training->save();
            return redirect()->back()->with('success', 'File deleted successfully');
        }

        return redirect()->back()->with('error', 'File not found or permission denied');
    }
}
