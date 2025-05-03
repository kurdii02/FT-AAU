@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-transform: capitalize">{{ __('Edit ' . $mission->section) }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mission.update', $mission) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">

                                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title', $missionContent['title']) }}" required autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ old('description', $missionContent['description']) }}" required autofocus>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mission1" class="col-md-4 col-form-label text-md-end">Mission 1</label>

                                <div class="col-md-6">
                                    <input id="mission1" type="text"
                                        class="form-control @error('mission1') is-invalid @enderror" name="mission1"
                                        value="{{ old('mission1', $missionContent['mission1']) }}" required autofocus>

                                    @error('mission1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mission2" class="col-md-4 col-form-label text-md-end">Mission 2</label>

                                <div class="col-md-6">
                                    <input id="mission2" type="text"
                                        class="form-control @error('mission2') is-invalid @enderror" name="mission2"
                                        value="{{ old('mission2', $missionContent['mission2']) }}" required autofocus>

                                    @error('mission2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="mission3" class="col-md-4 col-form-label text-md-end">Mission 3</label>

                                <div class="col-md-6">
                                    <input id="mission3" type="text"
                                        class="form-control @error('mission3') is-invalid @enderror" name="mission3"
                                        value="{{ old('mission3', $missionContent['mission3']) }}" required autofocus>

                                    @error('mission3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" name="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if (isset($missionContent['image']))
                                    <img src="{{ asset('storage/' . $missionContent['image']) }}" width="100">
                                @endif
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ 'Update' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
