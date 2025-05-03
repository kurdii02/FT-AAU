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
        }
        if (Auth::user()->role->name == "trainer") {
            $trainings = Training::with(['student', 'trainer', 'admin', 'company'])
                ->where('trainer_id', Auth::id())
                ->get();
        }
        if (Auth::user()->role->name == "student") {
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
        $training = Training::find($id);
        return view('trainings.details', compact('training'));
    }
    public function addDetails(Request $request, $id)
    {
        $training = Training::findOrFail($id);
        $data = $request->validate([
            'evaluation' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,pdf,docx|max:2048',
        ]);
        if ($request->hasFile('evaluation')) {
            $filePath = $request->file('evaluation')->store('training_files/Evaluation', 'public');
            $training->evaluation = $filePath;
        }


        $training->save();

        return redirect()->route('trainings.index');
    }
    public function getDownload(Training $training)
    {
        // Build full paths to the files (assuming they're in /public directory)
        $files = [
            public_path('storage/' . $training->evaluation),
            public_path('storage/' . $training->training_book)
        ];

        // Filter only existing files
        // $files = array_filter($files, fn($file) => file_exists($file));

        // dd($files);

        if (empty($files)) {
            abort(404, 'Files not found.');
        }

        $zipFileName = 'training-files-' . Str::random(6) . '.zip';
        $zipPath = storage_path("app/{$zipFileName}");

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                // dd($file);
                $zip->addFile($file, basename($file)); // Add each file with its original name
            }
            $zip->close();
        } else {
            abort(500, 'Could not create ZIP archive.');
        }

        return response()->download($zipPath);
    }
}
