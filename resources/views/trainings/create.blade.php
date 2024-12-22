<!-- resources/views/trainings/create.blade.php -->
@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endpush
@section('content')
    @livewire('training-form', [
    'companies' => $companies,
    'students' => $students,
    'admins' => $admins,
    ])
@endsection
