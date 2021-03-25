@extends('layouts.dashboard')

@section('title')
    Dashboard Video | Lapakanik
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Video Saya</h2>
                <p class="dashboard-subtitle">
                  Kelola Video yang anda upload
                </p>
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

              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">

                    {{-- @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif --}}

                    <a
                      href="{{ route('dashboard-product-create') }}"
                      class="btn btn-success"
                      >Tambah Video Baru</a
                    >
                  </div>
                </div>
                <div class="row mt-4">

                    @forelse ($products as $product)
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
            >
              <a class="component-products d-block" href="{{ route('dashboard-product-details', $product->id) }}">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
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
                Video Masih Kosong
              </div>
            @endforelse

                </div>
              </div>

              {{-- @endif --}}

            </div>
          </div>
@endsection
