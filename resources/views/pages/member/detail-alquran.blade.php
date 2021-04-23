@extends('layouts.member')

@section('title')
  Al-Quran
@endsection

@section('content')

@push('addon-style')
<style>
    .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
#link {
            color : #FFB60C !important ;
        }
</style>

@endpush
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">  {{ $data['data']['name']['transliteration']['id'] }} </h2>
      <p class="dashboard-subtitle">
       {{-- sub --}}
      </p>
    </div>
    @if(Auth::check() && !Auth::user()->email_verified_at)
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('home') }}">
                        <div class="card-body">
                            <p class="toko text-danger" ><i class="fas fa-exclamation"></i> <small> Hei {{ Auth::user()->name }}, Silahkan verifikasi email anda untuk menikmati fiktur ini.</small></p>
                        </div>
                    </a>
                </div>
                <div class="dashboard-content justfy-content-center">
                    <div class="card">
                    <div class="card-body">
                       <small>
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link btn-sm p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </small>
                        </div>
                    </div>
                     @if (session('resent'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @elseif (Auth::check() && !Auth::user()->nama_majelis)
    <div class="row mt-3">
            <div class="col-md-12">
            <div class="card">
                <a href="{{ route('profile.index') }}">
                <div class="card-body">
                    <p class="toko text-danger" ><i class="fas fa-exclamation"></i> <small> Hei {{ Auth::user()->name }}, Silahkan atur profil kamu agar bisa upload video. </small></p>
                </div>
                </a>
            </div>
            </div>
        </div>
    @else

    <div class="dashboard-content justify-content-center">
      <div class="row">
        <div class="col-12">
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


           <div class="row">
               <div class="container mt-5">
                    @foreach ($data['data']['verses'] as $item )
                        <h3 class="text-right mt-3 ">{{ $item['text']['arab'] }} ~ {{ $item['number']['inSurah'] }}</h3>
                        <h6 class="text-left mt-2">{{ $item['translation']['id'] }}</h6>
                    @endforeach
               </div>
           </div>

        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection

@push('addon-script')
@endpush
