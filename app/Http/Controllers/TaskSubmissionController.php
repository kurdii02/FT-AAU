<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskAttachment;
use App\Models\TaskSubmission;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskSubmissionController extends Controller
{
    /**
     * Show the form for creating a new submission.
     */
    public function create(Training $training, Task $task)
    {
        // $this->authorize('submitTask', [$task, $training]);

        return view('submissions.create', compact('training', 'task'));
    }

    /**
     * Store a newly created submission in storage.
     */
    public function store(Request $request, Training $training, Task $task)
    {
        // $this->authorize('submitTask', [$task, $training]);

        $validated = $request->validate([
            'submission_content' => 'required|string',
        ]);

        $submission = $task->submissions()->create([
            'student_id' => Auth::id(),
            'submission_content' => $validated['submission_content'],
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('submission-attachments');

                TaskAttachment::create([
                    'submission_id' => $submission->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('trainings.tasks.show', [$training, $task])
            ->with('success', 'Submission added successfully.');
    }

    /**
     * Review a submission (for trainers).
     */
    public function review(Request $request, Training $training, Task $task, TaskSubmission $submission)
    {
        // $this->authorize('reviewSubmission', [$submission, $training]);

        $validated = $request->validate([
            'feedback' => 'required|string',
            'status' => 'required|integer|between:1,3',
        ]);

        $submission->update($validated);

        return redirect()->route('trainings.tasks.show', [$training, $task])
            ->with('success', 'Submission reviewed successfully.');
    }
}
