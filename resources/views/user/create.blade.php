@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endpush
@section('content')
    @livewire('create-user-form', [
    'companies' => $companies,
    'roles'=>$roles
    ])
@endsection

