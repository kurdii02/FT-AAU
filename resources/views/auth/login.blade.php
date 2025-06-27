@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url('{{ asset('images/login.jpg') }}');">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password<span class="pass-validation"> * at least 8
                                        characters</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 ">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In
                                </button>
                            </div>
                            <div class="form-group d-md-flex align-items-center">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">
                                        <span class="checkmark"></span>
                                        <input type="checkbox" checked>
                                        Remember Me
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection









{{-- <div class="container"> --}}
{{--    <div class="row justify-content-center"> --}}
{{--        <div class="col-md-8"> --}}
{{--            <div class="card"> --}}
{{--                <div class="card-header">{{ __('Login') }}</div> --}}

{{--                <div class="card-body"> --}}
{{--                    <form method="POST" action="{{ route('login') }}"> --}}
{{--                        @csrf --}}

{{--                        <div class="row mb-3"> --}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

{{--                            <div class="col-md-6"> --}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

{{--                                @error('email') --}}
{{--                                <span class="invalid-feedback" role="alert"> --}}
{{--                                        <strong>{{ $message }}</strong> --}}
{{--                                    </span> --}}
{{--                                @enderror --}}
{{--                            </div> --}}
{{--                        </div> --}}

{{--                        <div class="row mb-3"> --}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

{{--                            <div class="col-md-6"> --}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}

{{--                                @error('password') --}}
{{--                                <span class="invalid-feedback" role="alert"> --}}
{{--                                        <strong>{{ $message }}</strong> --}}
{{--                                    </span> --}}
{{--                                @enderror --}}
{{--                            </div> --}}
{{--                        </div> --}}

{{--                        <div class="row mb-3"> --}}
{{--                            <div class="col-md-6 offset-md-4"> --}}
{{--                                <div class="form-check"> --}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}

{{--                                    <label class="form-check-label" for="remember"> --}}
{{--                                        {{ __('Remember Me') }} --}}
{{--                                    </label> --}}
{{--                                </div> --}}
{{--                            </div> --}}
{{--                        </div> --}}

{{--                        <div class="row mb-0"> --}}
{{--                            <div class="col-md-8 offset-md-4"> --}}
{{--                                <button type="submit" class="btn btn-primary"> --}}
{{--                                    {{ __('Login') }} --}}
{{--                                </button> --}}

{{--                                @if (Route::has('password.request')) --}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
{{--                                        {{ __('Forgot Your Password?') }} --}}
{{--                                    </a> --}}
{{--                                @endif --}}
{{--                            </div> --}}
{{--                        </div> --}}
{{--                    </form> --}}
{{--                </div> --}}
{{--            </div> --}}
{{--        </div> --}}
{{--    </div> --}}
{{-- </div> --}}
