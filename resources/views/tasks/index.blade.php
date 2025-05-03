@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Tasks for Training: {{ $training->id }}</h4>
                        @if (auth()->id() === $training->trainer_id)
                            <a href="{{ route('trainings.tasks.create', $training) }}" class="btn btn-primary">Create New
                                Task</a>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="training-details mb-4">
                            <p><strong>Student:</strong> {{ $training->student->name }}</p>
                            <p><strong>Trainer:</strong> {{ $training->trainer->name }}</p>
                            <p><strong>Company:</strong> {{ $training->company->name ?? 'N/A' }}</p>
                            <p><strong>Status:</strong>
                                @if ($training->status === 0)
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($training->status === 1)
                                    <span class="badge bg-info">In Progress</span>
                                @elseif($training->status === 2)
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-secondary">Unknown</span>
                                @endif
                            </p>
                        </div>

                        @if ($tasks->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Submissions</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td>{{ $task->title }}</td>
                                                <td>{{ $task->due_date->format('M d, Y') }}</td>
                                                <td>
                                                    @if ($task->status === 0)
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($task->status === 1)
                                                        <span class="badge bg-info">In Progress</span>
                                                    @elseif($task->status === 2)
                                                        <span class="badge bg-success">Completed</span>
                                                    @elseif($task->status === 3)
                                                        <span class="badge bg-danger">Overdue</span>
                                                    @endif
                                                </td>
                                                <td>{{ $task->creator->name }}</td>
                                                <td>{{ $task->submissions->count() }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('trainings.tasks.show', [$training, $task]) }}"
                                                            class="btn btn-sm btn-info">View</a>

                                                        @if (auth()->id() === $training->trainer_id || auth()->id() === $task->created_by)
                                                            <a href="{{ route('trainings.tasks.edit', [$training, $task]) }}"
                                                                class="btn btn-sm btn-primary">Edit</a>

                                                            <form
                                                                action="{{ route('trainings.tasks.destroy', [$training, $task]) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this task?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">Delete</button>
                                                            </form>
                                                        @endif

                                                        @if (auth()->id() === $training->student_id)
                                                            <a href="{{ route('trainings.tasks.submissions.create', [$training, $task]) }}"
                                                                class="btn btn-sm btn-success">Submit</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">No tasks available for this training.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
