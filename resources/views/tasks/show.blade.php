@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>{{ $task->title }}</h4>
                        <a href="{{ route('trainings.tasks.index', $training) }}" class="btn btn-secondary">Back to Tasks</a>
                    </div>

                    <div class="card-body">
                        <div class="task-details mb-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>Description</h5>
                                    <div class="p-3 bg-light rounded">
                                        {!! nl2br(e($task->description)) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <p><strong>Due Date:</strong> {{ $task->due_date->format('M d, Y') }}</p>
                                            <p><strong>Status:</strong>
                                                @if ($task->status === 0)
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($task->status === 1)
                                                    <span class="badge bg-info">In Progress</span>
                                                @elseif($task->status === 2)
                                                    <span class="badge bg-success">Completed</span>
                                                @elseif($task->status === 3)
                                                    <span class="badge bg-danger">Overdue</span>
                                                @endif
                                            </p>
                                            <p><strong>Created By:</strong> {{ $task->creator->name }}</p>
                                            <p><strong>Created At:</strong> {{ $task->created_at->format('M d, Y H:i') }}
                                            </p>
                                            @if ($task->created_at != $task->updated_at)
                                                <p><strong>Updated At:</strong>
                                                    {{ $task->updated_at->format('M d, Y H:i') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($task->attachments->count() > 0)
                            <div class="task-attachments mb-4">
                                <h5>Task Attachments</h5>
                                <div class="list-group">
                                    @foreach ($task->attachments as $attachment)
                                        <a href="{{ Storage::url($attachment->file_path) }}"
                                            class="list-group-item list-group-item-action" target="_blank">
                                            <i class="fa fa-file"></i> {{ $attachment->file_name }}
                                            <span
                                                class="badge bg-secondary">{{ Str::upper(pathinfo($attachment->file_name, PATHINFO_EXTENSION)) }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (auth()->id() === $training->student_id && $task->submissions->where('student_id', auth()->id())->count() === 0)
                            <div class="mb-4 text-center">
                                <a href="{{ route('trainings.tasks.submissions.create', [$training, $task]) }}"
                                    class="btn btn-success btn-lg">Submit Your Work</a>
                            </div>
                        @endif

                        <div class="submissions mt-5">
                            <h4>Submissions</h4>

                            @if ($task->submissions->count() > 0)
                                @foreach ($task->submissions as $submission)
                                    <div class="card mb-3">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $submission->student->name }}</strong> submitted
                                                <span
                                                    class="text-muted">{{ $submission->created_at->diffForHumans() }}</span>
                                            </div>
                                            <div>
                                                @if ($submission->status === 0)
                                                    <span class="badge bg-primary">Submitted</span>
                                                @elseif($submission->status === 1)
                                                    <span class="badge bg-info">Reviewed</span>
                                                @elseif($submission->status === 2)
                                                    <span class="badge bg-success">Approved</span>
                                                @elseif($submission->status === 3)
                                                    <span class="badge bg-danger">Rejected</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Submission</h5>
                                            <div class="card-text p-3 bg-light rounded mb-3">
                                                {!! nl2br(e($submission->submission_content)) !!}
                                            </div>

                                            @if ($submission->attachments->count() > 0)
                                                <h6>Attachments</h6>
                                                <div class="list-group mb-3">
                                                    @foreach ($submission->attachments as $attachment)
                                                        <a href="{{ url('storage/' . $attachment->file_path) }}"
                                                            class="list-group-item list-group-item-action" target="_blank">
                                                            <i class="fa fa-file"></i> {{ $attachment->file_name }}
                                                            <span
                                                                class="badge bg-secondary">{{ Str::upper(pathinfo($attachment->file_name, PATHINFO_EXTENSION)) }}</span>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif

                                            @if ($submission->feedback)
                                                <h5 class="card-title">Feedback</h5>
                                                <div class="card-text p-3 bg-light rounded">
                                                    {!! nl2br(e($submission->feedback)) !!}
                                                </div>
                                            @endif
                                            @if ($submission->grade)
                                                <h5 class="card-title">Grade</h5>
                                                <div class="card-text p-3 bg-light rounded">
                                                    {!! nl2br(e($submission->grade)) . '/10' !!}
                                                </div>
                                            @endif

                                            @if ((auth()->id() === $training->trainer_id || auth()->id() === $training->admin_id) && $submission->status === 0)
                                                <form method="POST"
                                                    action="{{ route('trainings.tasks.submissions.review', [$training, $task, $submission]) }}"
                                                    class="mt-3">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group mb-3">
                                                        <label for="feedback">Provide Feedback</label>
                                                        <textarea id="feedback" class="form-control @error('feedback') is-invalid @enderror" name="feedback" rows="3"
                                                            required>{{ old('feedback') }}</textarea>
                                                        @error('feedback')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group  mb-3" style="width:20%">
                                                        <input type="number" max="10" min="0"
                                                            class="form-control" placeholder="Grade" name="grade"
                                                            aria-label="Grade">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">/10</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="status">Status</label>
                                                        <select id="status"
                                                            class="form-control @error('status') is-invalid @enderror"
                                                            name="status" required>
                                                            <option value="1">Reviewed</option>
                                                            <option value="2">Approved</option>
                                                            <option value="3">Rejected</option>
                                                        </select>
                                                        @error('status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Submit
                                                        Review</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info">No submissions yet.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
