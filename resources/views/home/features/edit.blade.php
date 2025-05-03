@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-transform: capitalize">{{ __('Edit ' . $featuresContent->section) }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('features.update', $featuresContent) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">

                                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title', $featuresContent->content['title']) }}" required autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sub_title" class="col-md-4 col-form-label text-md-end">Sub Title</label>

                                <div class="col-md-6">
                                    <input id="sub_title" type="text"
                                        class="form-control @error('sub_title') is-invalid @enderror" name="subtitle"
                                        value="{{ old('sub_title', $featuresContent->content['sub_title']) }}" required
                                        autofocus>

                                    @error('sub_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="feature1" class="col-md-4 col-form-label text-md-end">Feature 1 </label>

                                <div class="col-md-6">
                                    <input id="feature1" type="text"
                                        class="form-control @error('feature1') is-invalid @enderror" name="feature1"
                                        value="{{ old('feature1', $featuresContent->content['feature1']) }}" required
                                        autofocus>

                                    @error('feature1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="d-feature1" class="col-md-4 col-form-label text-md-end">Feature 1
                                    Description</label>

                                <div class="col-md-6">
                                    <textarea id="d-feature1" type="text" class="form-control @error('feature1_description') is-invalid @enderror"
                                        name="feature1_description" required autofocus>{{ $featuresContent->content['feature1_description'] }}</textarea>

                                    @error('feature1_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="feature2" class="col-md-4 col-form-label text-md-end">Feature 2 </label>

                                <div class="col-md-6">
                                    <input id="feature2" type="text"
                                        class="form-control @error('feature2') is-invalid @enderror" name="feature2"
                                        value="{{ old('feature2', $featuresContent->content['feature2']) }}" required
                                        autofocus>

                                    @error('feature2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="d-feature2" class="col-md-4 col-form-label text-md-end">Feature 2
                                    Description</label>

                                <div class="col-md-6">
                                    <textarea id="d-feature2" type="text" class="form-control @error('feature2_description') is-invalid @enderror"
                                        name="feature2_description" required autofocus>{{ $featuresContent->content['feature2_description'] }}</textarea>

                                    @error('feature2_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="feature3" class="col-md-4 col-form-label text-md-end">Feature 3 </label>

                                <div class="col-md-6">
                                    <input id="feature3" type="text"
                                        class="form-control @error('feature3') is-invalid @enderror" name="feature3"
                                        value="{{ old('feature3', $featuresContent->content['feature3']) }}" required
                                        autofocus>

                                    @error('feature3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="d-feature3" class="col-md-4 col-form-label text-md-end">Feature 3
                                    Description</label>

                                <div class="col-md-6">
                                    <textarea id="d-feature3" type="text" class="form-control @error('feature3_description') is-invalid @enderror"
                                        name="feature3_description" value="{{ old('feature3_description') }}" required autofocus>{{ $featuresContent->content['feature3_description'] }}</textarea>

                                    @error('feature3_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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
