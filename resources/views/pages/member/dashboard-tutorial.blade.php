@extends('layouts.member')

@section('title')
    Tutorial Hadroh
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
              <h2 class="dashboard-title">Tutorial Hadroh</h2>
              <p class="dashboard-subtitle">
                Kumpulan Video Video Tutorial hadroh
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
               @php $incrementProduct = 0 @endphp
            @forelse ($products as $product)
                <div
                    class="col-6 col-md-4 col-lg-3 mt-4"
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementProduct+= 100 }}"
                >
                    <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div
                            class="products-image"
                            style="
                                @if($product->galleries()->first())
                                    background-image: url('{{ Storage::url($product->galleries()->first()->photos) }}')
                                @else
                                    background-color: #eee
                                @endif
                            "
                            ></div>
                        </div>
                        <div class="products-text text-center">
                            {{ $product->name }}
                        </div>
                        <a href="{{ route('detail', $product->slug) }}" class="btn btn-info btn-sm d-block"><i class="fas fa-eye"></i> Lihat Video</a>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5"
                data-aos="fade-up"
                data-aos-delay="100">
                        No Products Found
                </div>
            @endforelse
              </div>
            </div>
        </div>
    <!-- /end page -->

@endsection


@push('addon-script')

@endpush
