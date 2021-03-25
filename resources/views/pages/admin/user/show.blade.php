@extends('layouts.dashboard')

@section('title')
  Member Info
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title"> {{ $item->name }}</h2>
      <p class="dashboard-subtitle">
        All Info Member
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('dashboard-settings-redirect','dashboard-settings-store') }}" method="POST" enctype="multipart/form-data" id="locations">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Nama *</label>
                      <input
                        type="text"
                        class="form-control"
                        value="{{ $item->name }}"
                      readonly />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email *</label>
                      <input
                        type="email"
                        class="form-control"
                        value="{{ $item->email }}"
                      readonly />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Nama Majelis *</label>
                      <input
                        type="text"
                        class="form-control"
                        value="{{ $item->nama_majelis }}"
                     readonly />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email Majelis *</label>
                      <input
                        type="text"
                        class="form-control"
                        value="{{ $item->email_majelis }}"
                     readonly />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Kontak Wa Majelis *</label>
                      <input
                        type="text"
                        class="form-control"
                        value="{{ $item->wa_majelis }}"
                     readonly />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Pengurus Majelis *</label>
                      <input
                        type="text"
                        class="form-control"
                        value="{{ $item->pengurus_majelis }}"
                      readonly />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="alamat_majelis">Alamat Lengkap Majelis *</label>
                        <textarea class="form-control" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" readonly>{{ $item->alamat_majelis }}, {{ $item->kota->name }}, {{ $item->provinsi->name }}, {{ $item->zip_code }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="sejarah_majelis">Sejarah Lengkap Majelis</label>
                        <textarea class="form-control" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" readonly>{{ $item->sejarah_majelis }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="layanan_majelis">Layanan Majelis</label>
                      <textarea class="form-control" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" readonly>{{ $item->layanan_majelis }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="layanan_majelis">Visi Misi</label>
                      <textarea class="form-control" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" readonly>
Visi : {{ $item->visi_majelis }}
Misi : {{ $item->misi_majelis }}
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Url Facebook</label>
                      <input
                        type="text"
                        class="form-control"
                        id="fb"
                        name="fb"
                        value="{{ $item->fb }}"/>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email">Url Instagram</label>
                      <input
                        type="text"
                        class="form-control"
                        id="ig"
                        name="ig"
                        value="{{ $item->ig }}"/>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email">Url Tiktok</label>
                      <input
                        type="text"
                        class="form-control"
                        id="tt"
                        name="tt"
                        value="{{ $item->tt }}"/>
                    </div>
                  </div>
                  <div class="col-md-4 offset-md-2">
                    <div class="form-group">
                      <label for="email">Url Youtube</label>
                      <input
                        type="text"
                        class="form-control"
                        id="yt"
                        name="yt"
                        value="{{ $item->yt }}"/>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email">Url Twitter</label>
                      <input
                        type="text"
                        class="form-control"
                        id="tw"
                        name="tw"
                        value="{{ $item->tw }}"/>
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
