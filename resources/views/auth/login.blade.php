@extends('layouts.app')

@section('content')
   
    <div class="auth-header">
        <a href="#"><img src="../assets/images/logo-dark.svg" alt="img"></a>
    </div>
    <div class="card my-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="card-body">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <h3 class="mb-0"><b>Login</b></h3>
                    <a href="{{ route('register') }}" class="link-primary">Don't have an account?</a>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" autocomplete="current-password">

                    @error('password')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex mt-1 justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                        <label class="form-check-label text-muted" for="customCheckc1">Keep me sign in</label>
                    </div>
                    <h5 class="text-secondary f-w-400">Forgot Password?</h5>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

            </div>
        </form>
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
