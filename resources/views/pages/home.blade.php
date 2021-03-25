@extends('layouts.app')

@section('title')
    Lapakanik Collaboration - Promosi Video Sholawat Gratis
@endsection

@section('content')
    <div class="page-content page-home">
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div
                id="storeCarousel"
                class="carousel slide"
                data-ride="carousel"
              >
                <div class="carousel-inner rounded-lg">
                  @foreach($banners as $banner)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <a href="{{$banner->link}}">
                        <img class="d-block w-100" src="{{ Storage::url($banner->photo) }}" alt="Carousel Image">
                    </a>
                    </div>
                  @endforeach
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
    <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <br><h5>Kategori Video</h5></br>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="owl-carousel owl-theme" id="category">
                @php $incrementCategory = 0 @endphp
                @forelse ($categories as $category)
                  <div
                  class="item"
                  data-aos="fade-up"
                  data-aos-delay="{{ $incrementCategory+= 50 }}"
                >
                  <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                    <div class="categories-image">
                      <img
                        src="{{ Storage::url($category->photo) }}"
                        alt=""
                        class="w-100"
                      />
                    </div>
                    <p class="categories-text">
                      {{ $category->name }}
                    </p>
                  </a>
                </div>
                @empty
                  <div class="col-12 text-center py-5"
                    data-aos="fade-up"
                    data-aos-delay="100">
                    Kategori Tidak Ditemukan
                  </div>
                @endforelse
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="">
        <div class="container">
            <div class="d-flex flex-row-reverse">
                <div class="row">
            <div class="col-6">
              <form action="/categories/cari" method="GET">
                <div class="tengah-search-new" data-aos="fade-up" data-aos-delay="100" >
                  <div class="search-new">
                    <input type="text" name="cari" placeholder="Cari Video" value="{{ old('cari') }}" />
                      <div class="button-src-new">
                        <button type="submit" id="btn"><i class="fas fa-search"></i></button>
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        </div>
      </section>

      <section class="store-new-products mt-4">
        <div class="container">
           <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h3>Video Terbaru</h3>
                    </div>
                </div>
                <div class="row mt-3">
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
                                        @if($product->galleries->count())
                                            background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                        @else
                                            background-color: #eee
                                        @endif
                                    "
                                    ></div>
                                </div>
                                <div class="products-text text-center">
                                    {{ $product->name }}
                                </div>
                                <a href="{{ route('detail', $product->slug) }}" class="btn btn-info btn-sm d-block text-white"><i class="fas fa-eye"></i> Lihat Video</a>

                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5"
                            data-aos="fade-up"
                            data-aos-delay="100">
                                No Video Found
                        </div>
                    @endforelse
                </div>
                <br><div class="text-center mt-4">
                    <a href="{{ route('categories') }}" class="btn btn-outline-info">Lihat Semua Video Sholawat</a>
                </div> <br>

        </div>
      </section>

      <section class="mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h3>Saatnya Majelis Nusantara Mendunia</h3>
              <h5 class="sub-judul">
                <b>Lapakanik Collaboration</b> adalah program kolaborasi dimana sahabat semua yang memiliki rekaman video penampilan / Latihan majelis Berkesempatan memperluas jaringan majelis melalui media online.

                    Tim Lapakanik akan membantu majelis anda dikenal lebih luas melalui asset digital Lapakanik seperti Instagram, Facebook, Youtube hingga Website Video. Anda cukup siapkan video terbaik penampilan majelis atau Latihan hadroh, tim Lapakanik akan bantu editing dan promosikan video anda secara GRATIS tanpa biaya sepeserpun.

              </h5>
            </div>
          </div>
        </div>
      </section>

      <section class="mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
              <div class="card-1" data-aos="fade-up" data-aos-delay="100">
                <img class="fitur-image" src="/images/Berkualitas.png" alt="" />
                <div class="products-text-fitur">PENDAFTARAN GRATIS</div>
                <div class="products-fitur-title">
                Anda bisa mulai mempromosikan majelis anda secara Gratis dengan cara mengirimkan video sholawat melalui website <b>Lapakanik Collaboration.</b>.
                </div>
              </div>
              <div class="card-1" data-aos="fade-up" data-aos-delay="200">
                <img class="fitur-image" src="/images/cs.png" alt="" />
                <div class="products-text-fitur">GRATIS EDITING VIDEO</div>
                <div class="products-fitur-title">
               Cukup kirimkan video sholawat terbaik dari majelis anda, tim Lapakanik akan bantu edit videonya menjadi lebih profesional hingga siap publish.
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4">
              <div class="card-1" data-aos="fade-up" data-aos-delay="300">
                <img class="fitur-image" src="/images/Efisien.png" alt="" />
                <div class="products-text-fitur">FULL SUPPORT</div>
                <div class="products-fitur-title">
                Menemukan kendala saat pendaftaran atau kirim video sholawat? Jangan khawatir, karena tim Lapakanik akan dengan senang hati membantu anda.
                </div>
              </div>
              <div class="card-1" data-aos="fade-up" data-aos-delay="400">
                <img
                  class="fitur-image"
                  src="/images/Kemitraan.png"
                  alt=""
                />
                <div class="products-text-fitur">PROGRAM KEMITRAAN</div>
                <div class="products-fitur-title">
                Setelah anda mendaftar di Website ini, anda berkesempatan mendaftar di Program Membership Lapakanik untuk bisa mendapat penghasilan tambahan hingga Jutaan Rupiah.
                </div>
              </div>
            </div>
            <div
              class="col-12 col-md-4 col-lg-4"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <h6 class="judul mt-5">CARA DAFTAR MENJADI MEMBER:</h6>
              <ol>
                <li class="list-judul">
                  <h5 class="sub-judul">
                    Pastikan anda sudah berada didalam website www.video.lapakanik.co.id. Kemudian klik tombol <b>Upload Gratis</b> dipojok kanan atas.
                  </h5>
                </li>
                <li class="list-judul">
                  <h5 class="sub-judul">
                    Klik Buat Akun dan lengkapi form registrasi menggunakan data diri anda sebagai calon member Lapakanik Collaboration
                  </h5>
                </li>
                <li class="list-judul">
                  <h5 class="sub-judul">
                    Kemudian Klik <b>Daftar</b> untuk menyelesaikan pendaftaran
                  </h5>
                </li>
                <li class="list-judul">
                  <h5 class="sub-judul">
                    Berhasil, anda sudah selesai melakukan pendaftaran di website Lapakanik Collaboration. Jika masih bingung, silahkan tonton video <span class="tebal">Panduan Lapakanik Collaboration</span> dengan cara klik tombol dibawah ini
                  </h5>
                </li>
              </ol>
              <a href="https://www.video.lapakanik.co.id/panduan" class="btn btn-info btn-gratis">
                Panduan Kirim Video
              </a>
              <a class="gratis-link" href="https://www.lapakanik.co.id/">Toko Online</a>
            </div>
          </div>
        </div>
      </section>
    <section class="mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-12" data-aos="fade-up">
              <h6 data-aos="fade-up" data-aos-delay="100">Our Clients :</h6>
              <div class="owl-carousel" id="support">
                @php $incrementCategory = 0 @endphp
                @forelse ($suports as $suport)
                  <div class="item" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 50 }}" >
                    <div class="categories-image">
                      <img src="{{ Storage::url($suport->photo) }}" alt="" class="w-100" />
                    </div>
                </div>
                @empty
                  <div class="col-12 text-center py-5"
                    data-aos="fade-up"
                    data-aos-delay="100">
                    Kosong
                  </div>
                @endforelse
        </div>
              </div>
            </div>
          </div>
        </div>
    </section>


    </div>
@endsection



