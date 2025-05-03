<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskAttachment;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks for a training.
     */
    public function index(Training $training)
    {
        // $this->authorize('viewTraining', $training);

        $tasks = $training->tasks()->with(['creator', 'submissions'])->get();

        return view('tasks.index', compact('training', 'tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create(Training $training)
    {
        // $this->authorize('createTask', $training);

        return view('tasks.create', compact('training'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request, Training $training)
    {
        // $this->authorize('createTask', $training);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date|after:today',
        ]);

        $task = $training->tasks()->create([
            'created_by' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('task-attachments');

                TaskAttachment::create([
                    'task_id' => $task->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('trainings.tasks.index', $training)
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified task.
     */
    public function show(Training $training, Task $task)
    {
        // $this->authorize('viewTask', [$task, $training]);

        $task->load(['creator', 'attachments', 'submissions' => function ($query) {
            $query->with(['student', 'attachments']);
        }]);

        return view('tasks.show', compact('training', 'task'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Training $training, Task $task)
    {
        // $this->authorize('updateTask', [$task, $training]);

        return view('tasks.edit', compact('training', 'task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Training $training, Task $task)
    {
        // $this->authorize('updateTask', [$task, $training]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|integer|between:0,3',
        ]);

        $task->update($validated);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('task-attachments');

                TaskAttachment::create([
                    'task_id' => $task->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('trainings.tasks.show', [$training, $task])
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Training $training, Task $task)
    {
        // $this->authorize('deleteTask', [$task, $training]);

        // Delete attachments files from storage
        foreach ($task->attachments as $attachment) {
            Storage::delete($attachment->file_path);
        }

        // Delete task (cascade will take care of related records)
        $task->delete();

        return redirect()->route('trainings.tasks.index', $training)
            ->with('success', 'Task deleted successfully.');
    }
}
