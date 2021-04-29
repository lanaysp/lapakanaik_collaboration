@extends('layouts.member')

@section('title')
    Dashboard Member
@endsection

@push('addon-style')
    <style>
        #link {
            color : #FFB60C !important ;
        }

       @media print {
     #sidebar-wrapper {
        display: none !important;
        visibility: hidden !important;
        }
     #buttonprint {
        display: none !important;
        visibility: hidden !important;
     }
     #komentar {
        display: none !important;
        visibility: hidden !important;
     }
       }

    </style>
@endpush

@section('content')
 <!-- page content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading" id="buttonprint">
              <h2 class="dashboard-title">Khutbah Page</h2>
              <p class="dashboard-subtitle">
              </p>
                <button class="btn btn-danger btn-sm" onclick="window.print()"><i class="fas fa-print"></i> Print Naskah</button>

            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="container mt-4">
                    <div class="col-lg-12">
                        <div class="dashboard-content">

 <section class="store-new-products mt-5">
        <div class="container">
          <div class="row">
              <div class="col-12 col-md-12 col-lg-12">

            <div class="text-center">
            <h3 class="mb-4 mt-4" data-aos="fade-up" data-aos-delay="200">{{ $khutbah->judul }}</h3>
              <img src="{{ Storage::url($khutbah->photo) }}" alt="" class="rounded img-fluid mb-2">
            <p class="khutbah-text mt-3 mb-4" data-aos="fade-up" data-aos-delay="300">{{ $khutbah->khutbahcategories->name }} • {{ $khutbah->created_at }}</p>
            </div>

              {{-- <img
                    src="{{ Storage::url($khutbah->photo) }}"
                    alt=""
                    class="w-100 mb-4 " data-aos="fade-up" data-aos-delay="400"
                  /> --}}

                  {!! $khutbah->description !!}

                  <small class="float-right"><a href="{{ $khutbah->sumber }}"><i>Sumber : www.nu.or.id</i></a></small>
                </div>
                    </div>
                  </div>
              </div>
              <div class="col-12">
            <div class="mt-5" id="komentar">
                share On :
                <a href="javascript:void(window.open('https://www.facebook.com/sharer.php?u=' + encodeURIComponent(document.location) + '?t=' + encodeURIComponent(document.title),'_blank'))" target="_self" class="justify-content-center social-share">
                  <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="javascript:void(window.open('https://twitter.com/share?url=' + encodeURIComponent(document.location) + '&amp;text=' + encodeURIComponent(document.title) + '&amp;via=codepolitan&amp;hashtags=codepolitan','_blank'))" target="_self" class="justify-content-center social-share">
                   <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="javascript:void(window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(document.location) + '&amp;title=' + encodeURIComponent(document.title),'_blank'))" class="justify-content-center social-share">
                    <i class="fab fa-whatsapp-square fa-2x"></i>
                </a>
                <a href="javascript:void(window.open('https://t.me/share/url?url=' + encodeURIComponent(document.location) + '&amp;title=' + encodeURIComponent(document.title),'_blank'))" class="justify-content-center social-share">
                    <i class="fab fa-telegram fa-2x"></i>
                </a>
                </div>
               <div class="col-12 mt-5" id="komentar">
                    @comments([
                        'model' => $khutbah,
                        'perPage' => 2
                    ])
               </div>

        </div>
            </div>

          </div>
        </div>
      </section>

                        </div>
                </div>

</div>
    <!-- /end page -->

@endsection



