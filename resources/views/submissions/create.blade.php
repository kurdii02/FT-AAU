@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit Work for Task: {{ $task->title }}</div>

                    <div class="card-body">
                        <div class="task-description mb-4">
                            <h5>Task Description</h5>
                            <div class="p-3 bg-light rounded">
                                {!! nl2br(e($task->description)) !!}
                            </div>
                            <p class="mt-2"><strong>Due Date:</strong> {{ $task->due_date->format('M d, Y') }}</p>
                        </div>

                        <form method="POST" action="{{ route('trainings.tasks.submissions.store', [$training, $task]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="submission_content">Your Submission</label>
                                <textarea id="submission_content" class="form-control @error('submission_content') is-invalid @enderror"
                                    name="submission_content" rows="5" required>{{ old('submission_content') }}</textarea>
                                <small class="form-text text-muted">Describe your work and any specific details the trainer
                                    should know.</small>
                                @error('submission_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="attachments">Attachments (Optional)</label>
                                <input id="attachments" type="file"
                                    class="form-control @error('attachments.*') is-invalid @enderror" name="attachments[]"
                                    multiple>
                                <small class="form-text text-muted">You can upload multiple files to support your
                                    submission.</small>
                                @error('attachments.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-success">
                                    Submit Work
                                </button>
                                <a href="{{ route('trainings.tasks.show', [$training, $task]) }}"
                                    class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
