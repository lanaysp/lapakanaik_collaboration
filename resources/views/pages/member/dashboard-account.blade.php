@extends('layouts.member')

@section('title')
  Profil
@endsection

@push('addon-style')
    <style>
      #form1 input::-webkit-input-placeholder {
  color: #000 !important;
}

#form1 input:-moz-placeholder {
  /* Firefox 18- */
  color: #000 !important;
}

#form1 input::-moz-placeholder {
  /* Firefox 19+ */
  color: #000 !important;
}

#form1 input:-ms-input-placeholder {
  color: #000 !important;
}

input::-webkit-input-placeholder {
  color: #ccc !important;
}

input:-moz-placeholder {
  /* Firefox 18- */
  color: #ccc !important;
}

input::-moz-placeholder {
  /* Firefox 19+ */
  color: #ccc !important;
}

input:-ms-input-placeholder {
  color: #ccc !important;
}

textarea::-webkit-input-placeholder {
  color: #ccc !important;
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
                      <label for="name">Nama</label>
                      <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ $user->name }}"
                     disabled />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ $user->email }}"
                      disabled/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Nama Majelis</label>
                      <input
                        type="text"
                        class="form-control"
                        id="majelis"
                        name="nama_majelis"
                        value="{{ $user->nama_majelis }}"
                      placeholder="Contoh : Musholla Al Huda"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email Majelis</label>
                      <input
                        type="text"
                        class="form-control"
                        id="email_majelis"
                        name="email_majelis"
                        value="{{ $user->email_majelis }}"
                      placeholder="Contoh : lapakanik@gmail.com"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Kontak Wa Majelis</label>
                      <input
                        type="number"
                        class="form-control"
                        id="wa_majelis"
                        name="wa_majelis"
                        value="{{ $user->wa_majelis }}"
                      placeholder="Contoh : 628512345897" required/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Pengurus Majelis</label>
                      <input
                        type="text"
                        class="form-control"
                        id="pengurus_majelis"
                        name="pengurus_majelis"
                        value="{{ $user->pengurus_majelis }}"
                      placeholder="Contoh : Ujang Anik" required/>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="alamat_majelis">Alamat Lengkap Majelis</label>
                        <textarea class="form-control" name="alamat_majelis" id="alamat_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 84px;" placeholder="Contoh: Jl. Prawira Kepolo, Rt/Rw. 004/001, Ds. Singaraja, Kec. Indramayu" required>{{ $user->alamat_majelis }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="provinces_id">Provinsi</label>
                      <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                        <option v-for="province in provinces" :value="province.id" required>@{{ province.name }}</option>
                      </select>
                      <select v-else class="form-control"></select>
                      <small class="text-danger">Abaikan jika sudah diisi</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="regencies_id">Kota</label>
                      <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                        <option v-for="regency in regencies" :value="regency.id"placeholder="Contoh : ">@{{ regency.name }}</option>
                      </select>
                      <select v-else class="form-control"></select>
                      <small class="text-danger">Abaikan jika sudah diisi</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="zip_code">Kode Pos</label>
                      <input
                        type="text"
                        class="form-control"
                        id="zip_code"
                        name="zip_code"
                        value="{{ $user->zip_code }}"
                      placeholder="Contoh : 45218"/>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="sejarah_majelis">Sejarah Lengkap Majelis</label>
                        <textarea class="form-control" name="sejarah_majelis" id="sejarah_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 182px;" placeholder="Isikan sesuai sejarah dari Majelis/Group hadroh anda ..."required>{{ $user->sejarah_majelis }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="layanan_majelis">Layanan Majelis</label>
                      <textarea class="form-control" name="layanan_majelis" id="layanan_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 187px;" placeholder="Tuliskan apa saja layanan dari majelis anda, contohnya seperti:
1. Acara Nikahan
2. Acara Khitanan
3. Dan lain sebagainya">{{ $user->layanan_majelis }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="visi_majelis">Visi Majelis</label>
                        <textarea class="form-control" name="visi_majelis" id="visi_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 136px;" placeholder="Tuliskan Misi Majelis Anda ....">{{ $user->visi_majelis }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="misi_majelis">Misi Majelis</label>
                        <textarea class="form-control" name="misi_majelis" id="misi_majelis" cols="30" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 136px;" placeholder="Tuliskan Misi Majelis Anda ..." required>{{ $user->misi_majelis }}</textarea>
                    </div>
                  </div>
                  <h6 class="mt-2 mb-4 col-12">Informasi Tambahan Majelis:</h6>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Url Facebook</label>
                      <input
                        type="text"
                        class="form-control"
                        id="fb"
                        name="fb"
                        value="{{ $user->fb }}"/>
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
                        value="{{ $user->ig }}"/>
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
                        value="{{ $user->tt }}"/>
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
                        value="{{ $user->yt }}"/>
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
                        value="{{ $user->tw }}"/>
                    </div>
                  </div>
                </div>
                
                
                     

                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      <i class="fas fa-plus-circle"></i> Update Profil
                    </button>
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

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id: null,
          regencies_id: null
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function(response){
                self.provinces = response.data;
              })
          },
          getRegenciesData() {
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function(response){
                self.regencies = response.data;
              })
          },
        },
        watch: {
          provinces_id: function(val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          }
        }
      });
    </script>
@endpush
