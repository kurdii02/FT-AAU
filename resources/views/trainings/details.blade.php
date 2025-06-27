@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Super Admin Section -->
                @if (auth()->user()->role->name === 'super_admin')
                    <div class="card mb-4">
                        <div class="card-header text-white bg-dark">
                            <h5 class="mb-0">Super Admin Section - All Training Files</h5>
                        </div>
                        <div class="card-body">
                            <!-- Display All Admin Files -->
                            @if (isset($training->admin_files) && count($training->admin_files) > 0)
                                <div class="mb-4">
                                    <h6>Admin Uploaded Files:</h6>
                                    <div class="list-group">
                                        @foreach ($training->admin_files as $file)
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{ $file['name'] }}</span>
                                                <div>
                                                    <a href="{{ route('trainings.download-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                        class="btn btn-sm btn-outline-primary">Download</a>
                                                    <form method="POST"
                                                        action="{{ route('trainings.delete-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this file?')">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Display All Trainer Files -->
                            @if (isset($training->trainer_files) && count($training->trainer_files) > 0)
                                <div class="mb-4">
                                    <h6>Trainer Uploaded Files:</h6>
                                    <div class="list-group">
                                        @foreach ($training->trainer_files as $file)
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{ $file['name'] }}</span>
                                                <div>
                                                    <a href="{{ route('trainings.download-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                        class="btn btn-sm btn-outline-success">Download</a>
                                                    <form method="POST"
                                                        action="{{ route('trainings.delete-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this file?')">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if (
                                (!isset($training->admin_files) || count($training->admin_files) == 0) &&
                                    (!isset($training->trainer_files) || count($training->trainer_files) == 0))
                                <p class="text-muted mb-3">No files have been uploaded yet.</p>
                            @endif

                            <hr>
                            <!-- Super Admin Upload Form -->
                            <h6>Upload Files as Super Admin:</h6>
                            <form method="POST" action="{{ route('trainings.upload-admin-files', $training->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="training_materials" class="col-md-3 col-form-label text-md-end">Training
                                        Materials</label>
                                    <div class="col-md-8">
                                        <input id="training_materials" type="file"
                                            class="form-control @error('training_materials') is-invalid @enderror"
                                            name="training_materials[]" multiple
                                            accept=".pdf,.doc,.docx,.ppt,.pptx,.txt,.zip,.jpeg,.png,.jpg,.gif,.svg,.webp">
                                        <small class="text-muted">You can select multiple files</small>
                                        @error('training_materials')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-3">
                                        <button type="submit" class="btn btn-dark">
                                            Upload Files
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Admin Section -->
                @if (auth()->user()->role->name === 'admin' || auth()->user()->id === $training->admin_id)
                    <div class="card mb-4">
                        <div class="card-header text-white">
                            <h5 class="mb-0">Admin Section - Upload Training Materials</h5>
                        </div>
                        <div class="card-body">
                            @if (isset($training->trainer_files) && count($training->trainer_files) > 0)
                                <div class="mb-4">
                                    <h6>Training Materials (Provided by Trainer):</h6>
                                    <div class="list-group">
                                        @foreach ($training->trainer_files as $file)
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{ $file['name'] }}</span>
                                                <a href="{{ route('trainings.download-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                    class="btn btn-sm btn-outline-primary">Download</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            @endif
                            <form method="POST" action="{{ route('trainings.upload-admin-files', $training->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="training_materials" class="col-md-3 col-form-label text-md-end">Training
                                        Materials</label>
                                    <div class="col-md-8">
                                        <input id="training_materials" type="file"
                                            class="form-control @error('training_materials') is-invalid @enderror"
                                            name="training_materials[]" multiple
                                            accept=".pdf,.doc,.docx,.ppt,.pptx,.txt,.zip,.jpeg,.png,.jpg,.gif,.svg,.webp">
                                        <small class="text-muted">You can select multiple files</small>
                                        @error('training_materials')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            Upload Files
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Display Admin Uploaded Files -->
                            @if (isset($training->admin_files) && count($training->admin_files) > 0)
                                <hr>
                                <h6>Uploaded Files:</h6>
                                <div class="list-group">
                                    @foreach ($training->admin_files as $file)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{ $file['name'] }}</span>
                                            <div>
                                                <a href="{{ route('trainings.download-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                    class="btn btn-sm btn-outline-primary">Download</a>
                                                <form method="POST"
                                                    action="{{ route('trainings.delete-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you sure you want to delete this file?')">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Trainer Section -->
                @if (auth()->user()->role->name === 'trainer' || auth()->user()->id === $training->trainer_id)
                    <div class="card mb-4">
                        <div class="card-header text-white">
                            <h5 class="mb-0">Trainer Section</h5>
                        </div>
                        <div class="card-body">
                            <!-- Display Admin Files for Trainer -->
                            @if (isset($training->admin_files) && count($training->admin_files) > 0)
                                <div class="mb-4">
                                    <h6>Training Materials (Provided by Admin):</h6>
                                    <div class="list-group">
                                        @foreach ($training->admin_files as $file)
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{ $file['name'] }}</span>
                                                <a href="{{ route('trainings.download-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                    class="btn btn-sm btn-outline-primary">Download</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            @endif

                            <!-- Trainer Upload Form -->
                            <h6>Upload Additional Materials:</h6>
                            <form method="POST" action="{{ route('trainings.upload-trainer-files', $training->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="trainer_materials" class="col-md-3 col-form-label text-md-end">Additional
                                        Materials</label>
                                    <div class="col-md-8">
                                        <input id="trainer_materials" type="file"
                                            class="form-control @error('trainer_materials') is-invalid @enderror"
                                            name="trainer_materials[]" multiple
                                            accept=".pdf,.doc,.docx,.ppt,.pptx,.txt,.zip,.jpeg,.png,.jpg,.gif,.svg,.webp">
                                        <small class="text-muted">You can select multiple files</small>
                                        @error('trainer_materials')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            Upload Files
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Display Trainer Uploaded Files -->
                            @if (isset($training->trainer_files) && count($training->trainer_files) > 0)
                                <hr>
                                <h6>Your Uploaded Files:</h6>
                                <div class="list-group">
                                    @foreach ($training->trainer_files as $file)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{ $file['name'] }}</span>
                                            <div>
                                                <a href="{{ route('trainings.download-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                    class="btn btn-sm btn-outline-success">Download</a>
                                                <form method="POST"
                                                    action="{{ route('trainings.delete-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you sure you want to delete this file?')">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Student Section (View Only) -->
                @if (auth()->user()->role->name === 'student' && auth()->user()->id === $training->student_id)
                    <div class="card mb-4">
                        <div class="card-header text-white">
                            <h5 class="mb-0">Training Materials</h5>
                        </div>
                        <div class="card-body">
                            <!-- Display Admin Files -->
                            @if (isset($training->admin_files) && count($training->admin_files) > 0)
                                <h6>Materials from Admin:</h6>
                                <div class="list-group mb-3">
                                    @foreach ($training->admin_files as $file)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{ $file['name'] }}</span>
                                            <a href="{{ route('trainings.download-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                class="btn btn-sm btn-outline-primary">Download</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Display Trainer Files -->
                            @if (isset($training->trainer_files) && count($training->trainer_files) > 0)
                                <h6>Materials from Trainer:</h6>
                                <div class="list-group">
                                    @foreach ($training->trainer_files as $file)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{ $file['name'] }}</span>
                                            <a href="{{ route('trainings.download-file', ['training' => $training->id, 'file' => $file['id']]) }}"
                                                class="btn btn-sm btn-outline-primary">Download</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if (
                                (!isset($training->admin_files) || count($training->admin_files) == 0) &&
                                    (!isset($training->trainer_files) || count($training->trainer_files) == 0))
                                <p class="text-muted text-center">No training materials have been uploaded yet.</p>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Access Denied Message -->
                @if (auth()->user()->role->name !== 'super_admin' &&
                        auth()->user()->role->name !== 'admin' &&
                        auth()->user()->role->name !== 'trainer' &&
                        auth()->user()->role->name !== 'student' &&
                        auth()->user()->id !== $training->admin_id &&
                        auth()->user()->id !== $training->trainer_id &&
                        auth()->user()->id !== $training->student_id)
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Access Denied</h5>
                            <p>You don't have permission to access this training's files.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
