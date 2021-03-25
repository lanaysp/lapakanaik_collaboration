@extends('layouts.dashboard')

@section('title')
    Category
@endsection

@section('content')
 <!-- page content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Catgory</h2>
          <p class="dashboard-subtitle">
            Edit Category
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
                 <form action="{{ route('category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Categori</label>
                                <input type="text" name="name" class="form-control" value="{{ $item->name }}"  required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Foto Kategori</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-success px-5">
                                Update
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
