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
