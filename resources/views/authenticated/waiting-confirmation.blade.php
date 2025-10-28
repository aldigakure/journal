@extends('layouts.app')

@section('content')
    <div class="auth-header d-flex justify-content-between w-100">
        <a href="#"><img src="{{ asset('assets/images/antrek.png') }}" width="80" alt="img"></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="ti ti-power"></i>
            <span>Logout</span>
        </a>
    </div>
    <div class="auth-body text-center">
        <h3>Menunggu Konfirmasi</h3>
        <h4>Silakan tunggu hingga admin mengkonfirmasi akun Anda.</h4>

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
