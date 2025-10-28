@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="auth-header">
        <a href="#"><img src="../assets/images/logo-dark.svg" alt="img"></a>
    </div>
    <div class="card my-5">
        <div class="card-body">
            <form action="/register" method="POST">
                @csrf
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <h3 class="mb-0"><b>Sign up</b></h3>
                    <a href="{{ route('login') }}" class="link-primary">Already have an account?</a>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                        @error('name')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
    
                        @error('email')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
    
                        @error('password')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                            autocomplete="new-password">
                    </div>
                </div>
                <p class="mt-4 text-sm text-muted">By Signing up, you agree to our <a href="#" class="text-primary"> Terms
                        of Service </a> and <a href="#" class="text-primary"> Privacy Policy</a></p>
                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary">daftar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="auth-footer row">
        <!-- <div class=""> -->
        <div class="col my-1">
            <p class="m-0">Copyright © <a href="#">Codedthemes</a></p>
        </div>
        <div class="col-auto my-1">
            <ul class="list-inline footer-link mb-0">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="#">Contact us</a></li>
            </ul>
        </div>
        <!-- </div> -->
    </div>
@endsection
