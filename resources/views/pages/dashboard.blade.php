@extends('layouts.dashboard')

@section('title')
    Dashboard Video | Lapakanik Collaboration
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Video Saya</h2>

              </div>

              {{-- @if(Auth::check() && !Auth::user()->email_verified_at)
                <div class="row mt-3">
                  <div class="col-md-12">
                    <div class="card">
                      <a href="{{ route('home') }}">
                      <div class="card-body">
                        <p class="toko"><i class="fas fa-exclamation"></i> <small> Hei {{ Auth::user()->name }}, Silahkan verifikasi email untuk dapat bertransaksi di toko ini.</small></p>
                      </div>
                      </a>
                    </div>
                  </div>
                </div>
              @else --}}

              <div class="dashboard-content">
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
              <div class="pagination" data-aos="flip-right" data-aos-delay="300">
            {{ $products->links() }}
          </div>

            </div>
            
          </div>
          
@endsection
