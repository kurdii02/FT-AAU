@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-transform: capitalize">Add Files To Training
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('trainings.details', $training->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">

                                <label for="title" class="col-md-4 col-form-label text-md-end">Evaluation File</label>

                                <div class="col-md-6 mb-3">
                                    <input id="evaluation" type="file"
                                        class="form-control @error('evaluation') is-invalid @enderror" name="evaluation"
                                        value="{{ old('evaluation', $training->training_book) }}" required autofocus>

                                    @error('evaluation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ 'Save' }}
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
