@extends('layouts.app')

@section('title')
    Detail Video | Lapakanik
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-details">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    Video Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-gallery mb-3" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
               <div class="video-container mb-3">
                <iframe src="{{ $product->price }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
               </div>
              </transition>
              <p class="text-detail text-right">{{ $product->user->nama_majelis}} • {{ $product->created_at->format('d-M-Y') }}</p>
            </div>
            <div class="col-lg-4">
              <div class="row">
                <div class="col-md-4 col-lg-12 mt-lg-0">
                    <h4 class="mb-5 d-none d-lg-block" data-aos="fade-up" data-aos-delay="100">Video lainya :</h4>
                    @php $incrementProduct = 0 @endphp
                    @forelse ($lainya as $lain)
                        <div
                            class="col-12"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementProduct+= 100 }}"
                        >
                            <a href="{{ route('detail', $lain->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail d-none d-lg-block">
                                    <div
                                    class="products-image"
                                    style="
                                        @if($lain->galleries->count())
                                            background-image: url('{{ Storage::url($lain->galleries->first()->photos) }}')
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

                        </div>
                    @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12">
                 Share On : <br/>

                <div class="mb-4">
                    <a href="javascript:void(window.open('https://www.facebook.com/sharer.php?u=' + encodeURIComponent(document.location) + '?t=' + encodeURIComponent(document.title),'_blank'))" target="_self" class="justify-content-center social-share">
                    <i class="fab fa-facebook fa-2x" style="color: #1877F2;"></i>
                </a>
                <a href="javascript:void(window.open('https://twitter.com/share?url=' + encodeURIComponent(document.location) + '&amp;text=' + encodeURIComponent(document.title) + '&amp;via=codepolitan&amp;hashtags=codepolitan','_blank'))" target="_self" class="justify-content-center social-share">
                    <i class="fab fa-twitter fa-2x" style="color: #1D8FD6;"></i>
                </a>
                <a href="javascript:void(window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(document.location) + '&amp;title=' + encodeURIComponent(document.title),'_blank'))" class="justify-content-center social-share">
                    <i class="fab fa-whatsapp fa-2x" style="color: #1EBEA5;"></i>
                </a>
                <a href="javascript:void(window.open('https://t.me/share/url?url=' + encodeURIComponent(document.location) + '&amp;title=' + encodeURIComponent(document.title),'_blank'))" class="justify-content-center social-share">
                    <i class="fab fa-telegram fa-2x" style="color: #249DFB;"></i>
                </a>
                <a href="javascript:void(window.open('https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(document.location) + '&amp;title=' + encodeURIComponent(document.title),'_blank'))" class="justify-content-center social-share">
                    <i class="fab fa-linkedin fa-2x" style="color: #0A66C2;"></i>
                </a>
                <a href="javascript:void(window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.location) + '&amp;title=' + encodeURIComponent(document.title),'_blank'))" class="justify-content-center social-share">
                    <i class="fab fa-pinterest fa-2x" style="color: #E60023;"></i>
                </a>
                </div>

                <h1>{{ $product->name }}</h1>
                <hr class="mt-2 mb-2">
                <div class="row">
                        <div class="col-12 col-md-12 col-lg-6">
                            <a target="_blank" rel="noopener noreferrer" href="http://bit.ly/lapakanikrebana" class="btn btn-success text-white btn-block mb-3">
                        <i class="fab fa-whatsapp"></i> Pesan Sekarang
                            </a>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6">
                            <a target="_blank" rel="noopener noreferrer" href="https://wa.me/{{ $product->wa_majelis }}"class="btn btn-info text-white btn-block mb-3">
                        <i class="fas fa-mobile-alt"></i> Kontak Majelis
                            </a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <div class="row">
          <div class="col-lg-9 col-12 mt-3">
            {!! $product->description !!}
            <hr>
            @comments([
                'model' => $product,
                'perPage' => 5
            ])
          </div>
         <div class="col-12 col-lg-3">
             <div class="card">
                 <div class="card-body">
                      <div class="col-3">
              <div class="col-lg-12">
                     <div class="card mt-3" style="width: 18rem;">
                        <form class="form-inline" action="/categories/cari" method="GET">
                            <input class="form-control col-lg-8 col-8 mr-1" name="cari" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-dark btn-member my-1 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                    <div class="list-group" style="width: 18rem;">
                        <h5 href="#" class="list-group-item list-group-item-action">
                            Video Terbaru
                        </h5>
                         @foreach ($random as $item)
                        <a href="{{ route('detail',$item->slug) }}" class="list-group-item list-group-item-action">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                    <div class="list-group" style="width: 18rem;">
                        <h5 href="#" class="list-group-item list-group-item-action">
                            Kategori Video
                        </h5>
                          @foreach ($categories as $item)
                        <a href="{{ route('categories-detail',$item->slug) }}" class="list-group-item list-group-item-action">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                    <div class="list-group" style="width: 18rem;">
                        <a href="https://my.domainesia.com/ref.php?u=12212" target="_blank"><img src="https://dnva.me/62c54" alt="DomaiNesia"></a>
                    </div>
                </div>
          </div>
                 </div>
             </div>
         </div>

        </div>
      </div>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
      <div class="row">
    <div class="col-12 col-lg-9 mt-3">

        <hr>
    </div>

  </div>

</div>
  </div>
</div>

                    </div>
                </div>
            </section>
                <section class="store-trend-categories position-fixed">
        <div class="container">
          <div class="row position-fixed">
            <div class="col-12">
              <h1 class="blog-kategori">Video lainya</h1>
            </div>
          </div>
          <div class="row mt-4">
            @php $incrementProduct = 0 @endphp
                    @forelse ($more as $lain)
                        <div
                            class="col-12 col-md-3 col-lg-3"

                        >
                            <a href="{{ route('detail', $lain->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div
                                    class="products-image"
                                    style="
                                        @if($lain->galleries->count())
                                            background-image: url('{{ Storage::url($lain->galleries->first()->photos) }}')
                                        @else
                                            background-color: #eee
                                        @endif
                                    "
                                    ></div>
                                </div>
                                <div class="products-text text-center">
                                    {{ $lain->name }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5"
                            data-aos="fade-up"
                            data-aos-delay="100">

                        </div>
                    @endforelse

                </div>
            </div>
        </section>

            <section class="mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                        <div class="mb-1" style="border-bottom: 3px dashed #d6d6d6"></div>
                        </div>
                    </div>
                </div>
            </section>
      </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
@endpush

