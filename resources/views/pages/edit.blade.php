@extends('layouts.auth')

@section('title')
    Edit Password | Lapakanik
@endsection

@section('content')
@include('includes.navbar')



   <div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-7 text-center">
                   <img
                        src="/images/hero/forgot.svg"
                        alt=""
                        class="w-95 d-none d-lg-block"
                        />
                </div>
                <div class="col-lg-5 w-100">
                    <h2 class="text-center mb-4">
                        Ubah Password !
                    </h2>
                        <form method="POST" action="{{ route('user.password.update') }}">
                            @method('patch')
                            @csrf

                            <div class="form-group">
                                <label for="current_password">{{ __('Konfirmasi Password Lama') }}</label>
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password Baru') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Konfirmasi Password Baru') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-register btn-block">
                                Ubah Password
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
