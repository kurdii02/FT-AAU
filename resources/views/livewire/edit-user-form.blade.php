<div class="registration-container">
    <div class="admin-content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="admin-header">
            <div class="breadcrumb">
                <a href="{{ route('user.index') }}" class="breadcrumbs-link">Users</a>
                <span>/</span>
                <span>Edit User</span>
            </div>
            <h2 class="page-title">Edit User</h2>
        </div>

        <form wire:submit.prevent="updateUser">
            <div class="section-wrapper">
                <h3 class="form-section-title">Basic Information</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('Full Name') }}</label>
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               wire:model="name" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               wire:model="email" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="section-wrapper">
                <h3 class="form-section-title">Access Details</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="role" class="form-label">{{ __('User Role') }}</label>
                        <select id="role" class="form-select @error('role_id') is-invalid @enderror"
                                wire:model.live="role_id" required>
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            @if($showCompanySelect)
            <div class="section-wrapper">
                <h3 class="form-section-title">Company Assignment</h3>
                <div class="form-group">
                    <select id="company" class="form-select @error('company_id') is-invalid @enderror"
                            wire:model="company_id">
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @endif

            <div class="form-actions">
                <a href="{{ route('user.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary" wire:loading.class="loading" wire:target="updateUser">
                    <span wire:loading.remove wire:target="updateUser" class="btn-text">
                        Update User
                    </span>
                    <span wire:loading wire:target="updateUser">Processing...</span>
                </button>
            </div>
        </form>
    </div>
</div>

