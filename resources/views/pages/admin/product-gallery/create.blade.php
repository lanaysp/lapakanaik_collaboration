@extends('layouts.admin')

@section('title')
    Product Gallery
@endsection

@section('content')
 <!-- page content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Product Gallery</h2>
          <p class="dashboard-subtitle">
            Create product Gallery
          </p>
        </div>
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-6">
                @if($errors->any())
                <div class="alter alter-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
              <div class="card">
                <div class="card-body">
                 <form action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Judul Video</label>
                                <select name="products_id" class="form-control">
                                  @foreach ($products as $product)
                                      <option value="{{ $product->id }}">{{ $product->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Foto Thumbnail</label>
                                <input type="file" name="photos" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Link Youtube</label>
                                <input type="text" name="link" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-success px-5">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /end page -->

@endsection
