@extends('layouts.dashboard')

@section('title')
    Banner
@endsection

@section('content')
 <!-- page content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Banner</h2>
          <p class="dashboard-subtitle">
            Edit Banner
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
                 <form action="{{ route('banner.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Banner</label>
                                <input type="text" name="name" class="form-control" value="{{ $item->name }}"  required>
                            </div>
                        </div>
        
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Foto Banner</label>
                            <input type="file" name="photo" class="form-control">
                          </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" name="link" class="form-control" value="{{ $item->link }}"  required>
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
