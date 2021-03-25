@extends('layouts.member')

@section('title')
    Video Saya
@endsection

@section('content')
<!-- Section Content -->
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid mb-5">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Video Saya</h2>

              </div>

              {{-- @if(Auth::check() && !Auth::user()->email_verified_at)
                <div class="row mt-3">
                  <div class="col-md-12">
                    <div class="card">
                      <a href="{{ route('home') }}">
                      <div class="card-body">
                        <p class="toko"><i class="fas fa-exclamation"></i> <small> Hei {{ Auth::user()->name }}, Silahkan verifikasi email untuk dapat bertransaksi di tokokoi.</small></p>
                      </div>
                      </a>
                    </div>
                  </div>
                </div>
              @else --}}

              <div class="dashboard-content mt-5">
                <div class="row mt-4">

                    @forelse ($products as $product)
            <div
              class="col-12 col-lg-4"
              data-aos="fade-up"
            >
              <a target="_blank" class="component-products d-block" href="{{ route('detail', $product->slug) }}">
                <div class="products-thumbnail" style="height:200px;">
                  <div
                    class="products-image member"
                    style="
                      @if($product->galleries->count())
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                      @else
                        background-color: #eee
                      @endif
                    "
                  ></div>
                </div>
              </a>
            </div>

            @empty
              <div class="col-12 text-center py-5"
                data-aos="fade-up"
                data-aos-delay="100">
                Video Anda Masih Kosong ! <a href="{{ route('video.index') }}">Silahkan uplaod video anda</a>
              </div>
            @endforelse

                </div>
              </div>

              {{-- @endif --}}

            </div>
          </div>
@endsection

@push('addon-script')
    {{-- <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'photo', name: 'photo' },
                { data: 'link', name: 'link' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ]
        })
    </script> --}}
@endpush
