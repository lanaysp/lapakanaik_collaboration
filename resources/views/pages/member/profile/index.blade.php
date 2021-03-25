@extends('layouts.member')

@section('title')
  Profil
@endsection

@push('addon-style')
<style>
input {
    border: 0 !important;
}
</style>

@endpush

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title"> {{ $user->name }}</h2>
      <p class="dashboard-subtitle">
        Update your current profile
    <div class="row">
        <div class="col text-right">
            <a href="{{ route('profile.completed') }}" class="btn btn-primary">
            <i class="fas fa-users"></i> Lengkapi Profile
            </a>
        </div>
    </div>
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="" method="POST" enctype="multipart/form-data" id="locations">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Namae *</label>
                      <input
                        type="text"
                        class="form-control no-border"
                        id="name"
                        name="name"
                        value="{{ $user->name }}"
                      disabled />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email *</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ $user->email }}"
                      disabled />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Nama Majelis *</label>
                      <input
                        type="text"
                        class="form-control"
                        id="majelis"
                        name="nama_majelis"
                        value="{{ $user->nama_majelis }}"
                     disabled />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email Majelis *</label>
                      <input
                        type="text"
                        class="form-control"
                        id="email_majelis"
                        name="email_majelis"
                        value="{{ $user->email_majelis }}"
                     disabled />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Kontak Wa Majelis *</label>
                      <input
                        type="text"
                        class="form-control"
                        id="wa_majelis"
                        name="wa_majelis"
                        value=""
                     disabled />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Pengurus Majelis *</label>
                      <input
                        type="text"
                        class="form-control"
                        id="pengurus_majelis"
                        name="pengurus_majelis"
                        value="{{ $user->pengurus_majelis }}"
                    disabled  />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="alamat_majelis">Alamat Lengkap Majelis *</label>
                        <textarea class="form-control" name="alamat_majelis" id="alamat_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" disabled>{{ $user->alamat_majelis }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="sejarah_majelis">Sejarah Lengkap Majelis</label>
                        <textarea class="form-control" name="sejarah_majelis" id="sejarah_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" disabled>{{ $user->sejarah_majelis }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="layanan_majelis">Layanan Majelis</label>
                      <textarea class="form-control" name="layanan_majelis" id="layanan_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" disabled>{{ $user->layanan_majelis }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="layanan_majelis">Visi Majelis</label>
                      <textarea class="form-control" name="layanan_majelis" id="layanan_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" disabled>{{ $user->visi_majelis }}</textarea>
                    </div>
                  </div><div class="col-md-6">
                    <div class="form-group">
                      <label for="layanan_majelis">Misi Majelis</label>
                      <textarea class="form-control" name="layanan_majelis" id="layanan_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" disabled>{{ $user->misi_majelis }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

