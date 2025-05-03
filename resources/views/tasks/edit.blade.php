@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Task</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('trainings.tasks.update', [$training, $task]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input id="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title', $task->title) }}" required autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                                    rows="5" required>{{ old('description', $task->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="due_date">Due Date</label>
                                <input id="due_date" type="date"
                                    class="form-control @error('due_date') is-invalid @enderror" name="due_date"
                                    value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}" required>
                                @error('due_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="status">Status</label>
                                <select id="status" class="form-control @error('status') is-invalid @enderror"
                                    name="status" required>
                                    <option value="0" {{ $task->status === 0 ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ $task->status === 1 ? 'selected' : '' }}>In Progress</option>
                                    <option value="2" {{ $task->status === 2 ? 'selected' : '' }}>Completed</option>
                                    <option value="3" {{ $task->status === 3 ? 'selected' : '' }}>Overdue</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="attachments">Add More Attachments (Optional)</label>
                                <input id="attachments" type="file"
                                    class="form-control @error('attachments.*') is-invalid @enderror" name="attachments[]"
                                    multiple>
                                <small class="form-text text-muted">You can upload multiple files.</small>
                                @error('attachments.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @if ($task->attachments->count() > 0)
                                <div class="form-group mb-3">
                                    <label>Current Attachments</label>
                                    <div class="list-group">
                                        @foreach ($task->attachments as $attachment)
                                            <div class="list-group-item">
                                                <a href="{{ Storage::url($attachment->file_path) }}" target="_blank">
                                                    {{ $attachment->file_name }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    Update Task
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
