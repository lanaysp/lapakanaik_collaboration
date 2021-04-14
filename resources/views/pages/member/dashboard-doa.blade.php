@extends('layouts.member')

@section('title')
  Do`a - Do`a
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
.wrapper{
  width:90%;
}
@media(max-width:992px){
 .wrapper{
  width:100%;
}
}
.panel-heading {
  padding: 0;
	border:0;
}
.panel-title>a, .panel-title>a:active{
	display:block;
	padding:15px;
  color:#555;
  font-size:16px;
  font-weight:bold;
	text-transform:uppercase;
	letter-spacing:1px;
  word-spacing:3px;
	text-decoration:none;
}
/* .panel-heading  a:before {
   font-family: 'Glyphicons Halflings';
   content: "\e114";
   float: right;
   transition: all 0.5s;
} */
.panel-heading.active a:before {
	-webkit-transform: rotate(180deg);
	-moz-transform: rotate(180deg);
	transform: rotate(180deg);
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
      <h2 class="dashboard-title">Do`a - Do`a</h2>
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
            {{-- @php
                dd($data['result']['data']);
            @endphp --}}
             @php $incrementCategory = 0 @endphp
                 @foreach ($data['result']['data'] as $item)

                   <div class="container">
                       <div class="row">
                           <div class="col-12">
                                <div class="wrapper center-block">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $incrementCategory+= 1 }}" aria-expanded="true" aria-controls="collapse">
                                    <h5>{{ $item['title'] }} <span class="far fa-plus-square float-right"></span></h5>
                                    </a>
                                </h4>
                                </div>
                                <div id="collapse{{ $incrementCategory}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <h3 class="text-right">{{ $item['arabic'] }}</h3>
                                    <h6 class="text-left">{{ $item['translation'] }}</h6>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                           </div>
                       </div>
                   </div>


                 @endforeach
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection

@push('addon-script')
<script>
     $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
</script>
@endpush
