@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Task</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('trainings.tasks.store', $training) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input id="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title') }}" required autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                                    rows="5" required>{{ old('description') }}</textarea>
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
                                    value="{{ old('due_date') }}" required>
                                @error('due_date')
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
                                <small class="form-text text-muted">You can upload multiple files.</small>
                                @error('attachments.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    Create Task
                                </button>
                                <a href="{{ route('trainings.tasks.index', $training) }}"
                                    class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
