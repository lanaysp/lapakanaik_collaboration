@extends('layouts.auth')

@section('title')
    Register
@endsection

@push('addon-style')
<style>
    .masuk{
        #color : #f8991d;
    }
</style>
@endpush
@include('includes.navbar')
@section('content')

<div class="page-content page-auth mb-5" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <h2 class="text-center">
                  Silahkan isi form dibawah ini untuk mendaftar
                </h2>
                <div class="col-lg-8 mt-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="row">
                         <div class="col-lg-6 col-12">
                            <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input id="name"
                                v-model="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </div>
                        </div>
                        <div class="col-lg-6 col-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input id="email"
                                v-model="email"
                                @change="checkForEmailAvailability()"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                :class="{ 'is-invalid' : this.email_unavailable }"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="col-lg-6 col-12">
                          <div class="form-group">
                            <label>Password</label>
                            <input id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input id="password-confirm"
                                type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation"
                                required
                                autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="checkbox" class="form-checkbox mb-3" id="lpas"> <label for="lpas">Lihat password</label>
                        <button
                            type="submit"
                            class="btn btn-block mt-4 btn-register"
                            :disabled="this.email_unavailable"
                        >
                            <i class="fas fa-user-plus"></i> Daftar
                        </button>
                        <div class="text-center mt-3">
                            Sudah punya akun?
                        <a href="{{ route('login') }}" class="login">
                            Masuk  
                        </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function(){
    $('.form-checkbox').click(function(){
        if($(this).is(':checked')){
        $('#password').attr('type','text');
        }else{
        $('#password').attr('type','password');
        }
    });
    });
    $(document).ready(function(){
    $('.form-checkbox').click(function(){
        if($(this).is(':checked')){
        $('#password-confirm').attr('type','text');
        }else{
        $('#password-confirm').attr('type','password');
        }
    });
    });
    </script>

    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
        },
        methods: {
            checkForEmailAvailability: function() {
                var self = this;
                axios.get('{{ route('api-register-check') }}', {
                    params: {
                        email: this.email
                    }
                })
                    .then(function (response) {
                        if(response.data == 'Available') {
                            self.$toasted.show(
                                "Email anda tersedia! Silahkan lanjut langkah selanjutnya!",
                                {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                                }
                            );
                            self.email_unavailable = false;

                        } else {
                            self.$toasted.error(
                                "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                                {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                                }
                            );
                            self.email_unavailable = true;
                        }

                        // handle success
                        console.log(response);
                    });
            }
        },
      });
    </script>
@endpush
