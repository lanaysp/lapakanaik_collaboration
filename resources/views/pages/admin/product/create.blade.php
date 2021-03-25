@extends('layouts.dashboard')

@section('title')
    Video
@endsection
@push('addon-style')
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
 <script src="https://cdn.tiny.cloud/1/8kwp4j9fpd7qyfu11tso7lqqda6mmp25e1u4ahi1jtke22vj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 
@endpush
@section('content')
 <!-- page content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Product</h2>
          <p class="dashboard-subtitle">
            Create product
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
                 <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Product</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pemilik Product</label>
                                <select name="users_id" class="form-control">
                                  @foreach ($users as $user)
                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Kategori Product multi slect</label>
                                <select name="categories_id" class="selectpicker form-control" multiple data-live-search="true">
                                  @foreach ($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Harga Product</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Deskripsi Product</label>
                                <textarea name="description" id="full-featured-non-premium"></textarea>
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

@push('addon-script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>


@endpush
