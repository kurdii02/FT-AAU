<div class="registration-container">
    <div class="admin-content">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="admin-header">
            <div class="breadcrumb">
                <a href="{{ route('trainings.index') }}" class="breadcrumbs-link">Trainings</a>
                <span>/</span>
                <span>Edit Training</span>
            </div>
            <h2 class="page-title">Edit Training</h2>
        </div>

        <form wire:submit.prevent="updateTraining">
            <div class="section-wrapper">
                <h3 class="form-section-title">Training Details</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="student" class="form-label">Student<span style="color: red">
                                *</span></label>
                        <select id="student" class="form-select @error('selectedStudent') is-invalid @enderror"
                            wire:model="selectedStudent">
                            <option value="">Select Student</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedStudent')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="admin" class="form-label">Supervisor<span style="color: red">
                                *</span></label>
                        <select id="admin" class="form-select @error('selectedAdmin') is-invalid @enderror"
                            wire:model="selectedAdmin">
                            <option value="">Select Admin</option>
                            @foreach ($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedAdmin')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="section-wrapper">
                <h3 class="form-section-title">Company Information</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="company" class="form-label">Company<span style="color: red">
                                *</span></label>
                        <select id="company" class="form-select @error('selectedCompany') is-invalid @enderror"
                            wire:model.live="selectedCompany">
                            <option value="">Select Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedCompany')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    @if ($selectedCompany)
                        <div class="form-group">
                            <label for="trainer" class="form-label">Trainer<span style="color: red">
                                    *</span></label>
                            <select id="trainer" class="form-select @error('selectedTrainer') is-invalid @enderror"
                                wire:model.live="selectedTrainer">
                                <option value="">Select Trainer</option>
                                @foreach ($trainers as $trainer)
                                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedTrainer')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status" class="form-label">Status<span style="color: red">
                            *</span></label>
                    <select id="status" class="form-select @error('status') is-invalid @enderror"
                        wire:model="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

    </div>
    <div class="form-actions">
        <a href="{{ route('trainings.index') }}" class="btn btn-link">Cancel</a>
        <button type="submit" class="btn btn-primary" wire:loading.class="loading" wire:target="updateTraining">
            <span wire:loading.remove wire:target="updateTraining" class="btn-text">
                Update Training
            </span>
            <span wire:loading wire:target="updateTraining">Processing...</span>
        </button>
    </div>
    </form>
</div>
</div>
