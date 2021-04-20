@extends('layouts.member')

@section('title')
    Dashboard Member
@endsection

@push('addon-style')
    <style>
        #link {
            color : #FFB60C !important ;
        }
    </style>
@endpush

@section('content')
 <!-- page content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Member Dashboard</h2>
              <p class="dashboard-subtitle">
                Dashboard Member
              </p>
            </div>

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
            <div class="dashboard-content">
<div class="row">
    <div class="container text-center mt-4">
        <div class="col-lg-12">
            <div class="dashboard-content">
              <div class="row">
                  <div class="col-md-4">
                    <a id="link" href="{{ route('alquran') }}">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">

                      </div>
                      <div class="dashboard-card-subtitle">
                        <i class="fas fa-quran"></i> Alquran
                      </div>
                    </div>
                  </div>
                </a>
                </div>

                <div class="col-md-4">
                 <a id="link" href="{{ route('doa') }}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">

                            </div>
                        <div class="dashboard-card-subtitle">
                        <i class="fas fa-hands"></i> Doa
                        </div>
                    </div>
                    </div>
                 </a>
                </div>
                <div class="col-md-4">
                <a href="{{ route('tahlil') }}" id="link">
                    <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">

                      </div>
                      <div class="dashboard-card-subtitle">
                        <i class="fas fa-pray"></i> Tahlil
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
              <div class="row">
                <div class="col-md-4">
                 <a href="{{ route('wirid') }}" id="link">
                     <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">

                      </div>
                      <div class="dashboard-card-subtitle">
                        <i class="fas fa-book-open"></i> Wirid
                      </div>
                    </div>
                  </div>
                </a>
                </div>
                <div class="col-md-4">
                  <a href="{{ route('khutbah') }}" id="link">
                    <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">

                      </div>
                      <div class="dashboard-card-subtitle">
                        <i class="fas fa-mosque"></i> Khutbah
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">

                      </div>
                      <div class="dashboard-card-subtitle">
                        <i class="fas fa-ellipsis-v"></i> Lainnya
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
{{-- content  --}}


     <div class="row mt-3">
        <div class="col-12 mt-2">
          <h5 class="mb-3">Jadwal Solat :  {{ $data['result']['lokasi'] }} </h5>
          <div class="row mb-2">
              <div class="col-lg-3 col-12">
                  Tanggal : {{ $data['result']['jadwal']['tanggal'] }}
              </div>
             <div class="col-lg-3 col-12">
                  Jam :    <span class="clock"> </span>
             </div>
          </div>

            {{-- <div class="row"> --}}
                    <a href="" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    Subuh
                                </div>
                                <div class="col-md-2">
                                    Dzuhur
                                </div>
                                <div class="col-md-2">
                                    Ashar
                                </div>
                                <div class="col-md-2">
                                    Magrib
                                </div>
                                <div class="col-md-2">
                                    Isa
                                </div>
                                <div class="col-md-2">
                                    Imsyak
                                </div>
                            </div>
                        </div>
                    </a>
            {{-- @foreach ($data['result']['jadwal'] as $item)
             @if ($item['jadwal']['tanggal'] == now()) --}}

                    <a href="" class="card card-list d-block">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                 {{ $data['result']['jadwal']['subuh'] }}
                            </div>
                            <div class="col-md-2">
                                 {{ $data['result']['jadwal']['dzuhur'] }}
                            </div>
                            <div class="col-md-2">
                                {{ $data['result']['jadwal']['ashar'] }}
                            </div>
                            <div class="col-md-2">
                                {{ $data['result']['jadwal']['maghrib'] }}
                            </div>
                            <div class="col-md-2">
                                {{ $data['result']['jadwal']['isya'] }}
                            </div>
                            <div class="col-md-2">
                                {{ $data['result']['jadwal']['imsak'] }}
                            </div>
                        </div>
                    </div>
                </a>
                {{-- @endif --}}
            {{-- </div> --}}
                    {{-- @endif
            @endforeach --}}


        </div>

    </div>

</div>
    <!-- /end page -->

@endsection


@push('addon-script')
<script>
    function clock() {// We create a new Date object and assign it to a variable called "time".
        var time = new Date(),

            // Access the "getHours" method on the Date object with the dot accessor.
            hours = time.getHours(),

            // Access the "getMinutes" method with the dot accessor.
            minutes = time.getMinutes(),


            seconds = time.getSeconds();

        document.querySelectorAll('.clock')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);

    function harold(standIn) {
        if (standIn < 10) {
        standIn = '0' + standIn
        }
        return standIn;
    }
}
    setInterval(clock, 1000);
</script>
@endpush
