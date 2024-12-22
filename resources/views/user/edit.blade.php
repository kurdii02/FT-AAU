@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endpush
@section('content')
    @livewire('edit-user-form',[
    'roles'=>$roles,
    'userId'=>$user->id
    ])
@endsection

