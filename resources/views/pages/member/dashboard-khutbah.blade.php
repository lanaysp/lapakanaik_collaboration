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
              <h2 class="dashboard-title">Khutbah Page</h2>
              <p class="dashboard-subtitle">
                Dashboard Khutbah
              </p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="container text-center mt-4">
                    <div class="col-lg-12">
                        <div class="dashboard-content">

 <section class="store-new-products mt-5">
        <div class="container">
          <div class="row">

            @php $incrementBlog = 300 @endphp
            @forelse ($data as $blog)

            <div
              class="col-12 col-md-12 col-lg-4 mb-2"
              data-aos="fade-up"
              data-aos-delay="{{ $incrementBlog+= 100 }}"
            >
              <a class="component-products d-block" href="{{ route('detail-khutbah', $blog->slug) }}">
                <div class="products-thumbnail">
                  <div
                    class="products-image member"
                    style="background-image: url('{{ Storage::url($blog->photo) }}')"
                  ></div>
                </div>
                <div class="blog-judul">
                    {{ $blog->judul }}
                </div>
                <div class="row mt-3">
                  <div class="col-6">
                    <p class="blog-text"><i class="fas fa-list-ul"></i> {{ $blog->khutbahcategories->name }}</p>
                  </div>
                  <div class="col-6">
                    <p class="blog-text text-right"><i class="fas fa-calendar-week"></i> {{ $blog->created_at }}</p>
                  </div>
                </div>
                <div
                  class="mt-n1"
                  style="border-bottom: 2px dashed #d6d6d6"
                ></div>
              </a>
            </div>

            @empty
              <div class="col-12 text-center py-5"
                data-aos="fade-up"
                data-aos-delay="100">
                Blog Tidak Ditemukan
              </div>
            @endforelse

          </div>
        </div>
      </section>

                        </div>
                </div>

</div>
    <!-- /end page -->

@endsection


@push('addon-script')

@endpush
