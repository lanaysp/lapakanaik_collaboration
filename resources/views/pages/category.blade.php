@extends('layouts.app')

@section('title')
    Fullset Category | Lapakanik
@endsection



@section('content')
    <!-- Page Content -->
    <div class="page-content page-home">

      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Kategori</h5>
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
            <div class="col-2">
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
              <h5>All Video</h5>
            </div>
          </div>
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
         <div class="row">
            <div class="col-12 mt-4">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection

