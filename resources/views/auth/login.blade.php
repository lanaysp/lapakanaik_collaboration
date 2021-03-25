@extends('layouts.auth')
@section('title')
    Login
@endsection
@include('includes.navbar')
@section('content')
<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-7 mt-5 text-center">
                    <img
                        src="/images/hero/login.svg"
                        alt=""
                        class="w-95 d-none d-lg-block"
                        />
                </div>
                <div class="col-lg-5 w-100">
                    <h2 class="text-center mb-4">
                        Untuk kamu yang sudah mendaftar silahkan login
                    </h2>
                    {{-- <p>Belum punya akun ? <a href="{{ route('register') }}">Daftar disini</a></p> --}}
                    <form method="POST" action="{{ route('login') }}" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                       <div class="row">
                            <div class="form-group text-left col-6">
                            <a href="{{ route('register') }}">
                                 Buat Akun !
                            </a>
                        </div>

                        <div class="form-group text-right col-6">
                             @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Lupa Password?') }}
                                </a>
                            @endif
                        </div>
                       </div>

                        <button
                            type="submit"
                            class="btn btn-info btn-block mt-4 btn-login text-white"
                        >
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
