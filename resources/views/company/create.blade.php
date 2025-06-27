@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endpush
@section('content')
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
                    <a href="{{ route('company.index') }}" class="breadcrumbs-link">Companies</a>
                    <span>/</span>
                    <span>Create New</span>
                </div>
                <h2 class="page-title">Add New Company</h2>
            </div>

            <form method="POST" action="{{ route('company.store') }}">
                @csrf

                <div class="section-wrapper">
                    <h3 class="form-section-title">Company Information</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name" class="form-label">{{ __('Company Name') }}<span style="color: red">
                                    *</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">{{ __('Email Address') }}<span style="color: red">
                                    *</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="section-wrapper">
                    <h3 class="form-section-title">Location Details</h3>
                    <div class="form-group">
                        <label for="location" class="form-label">{{ __('Company Location') }}<span style="color: red">
                                *</span></label>
                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror"
                            name="location" value="{{ old('location') }}" required>
                        @error('location')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('company.index') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <span class="btn-text">Create Company</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
