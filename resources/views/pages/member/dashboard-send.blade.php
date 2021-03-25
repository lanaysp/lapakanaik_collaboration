@extends('layouts.member')

@section('title')
  Kirim Video
@endsection

@section('content')

@push('addon-style')
<style>
    .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
#link {
            color : #FFB60C !important ;
        }
</style>

@endpush
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Upload Video Dari Majelis {{ $user->nama_majelis }}</h2>
      <p class="dashboard-subtitle">
        Page Kirim Video Member Lapakanik Colaboration
      </p>
    </div>
    <div class="dashboard-content justify-content-center">
      <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title">Cara Upload Video !</h5>
                    <hr>
                    <p class="card-text">
                         <ul>
                            <li>Sebelum anda upload video, pastikan data di profile sudah lengkap terisi semua. Jika belum, silahkan lengkapi dulu dengan cara klik <b><a href="{{ route('profile.index') }}" id="link">LENGKAPI PROFILE</a></b>
                            </li>
                            <li>Siapkan video majelis dengan durasi minimal 1 lagu dengan kualitas HD tidak blur, tidak goyang dan audio jelas. Untuk memudahkan proses editing.</li>
                            <li>Kirim video terbaik majelis anda dan jangan lupa tambahkan format Nama Majelis anda</li>
                            <li>Isi nama video dengan nama Majelis anda agar bisa memudahkan tim Lapakanik saat proses promosi video anda</li>
                            <!--<li>Klik tombol KIRIM VIDEO VIA TELEGRAM, MEDIAFIRE atau KIRIM VIDEO VIA SHARE GOOGLE DRIVE dibawah ini:</li>-->
                            <li>Klik tombol KIRIM VIDEO VIA TELEGRAM dibawah ini:</li>
                        </ul>
                    </p>
                    <hr>
                    <a target="_blank" href="https://t.me/lapakaniknusantara" class="btn btn-primary col-10 offset-1"><i class="fas fa-paper-plane"></i>  Kirim Video Via Telegram</a>
                    <!--<form class="mt-2">-->
                    <!--    <div class="form-group">-->
                    <!--        <div class="container row">-->
                    <!--            <input type="text" class="form-control col-6 offset-2" id="link">-->
                    <!--            <button type="submit" class="btn btn-primary col-2 ml-3">Kirim</button>-->
                    <!--            <small class="text-danger col-6 offset-2">* Hanya Masukan Link Google Drive dan MEDIAFIRE</small>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</form>-->
                </div>
            </div>
            <p class="text-center mt-3">
                 Masih bingung cara upload video? klik tombol panduan dibawah ini: <br>
                <a class="btn btn-warning mt-2" target="_blank" href="{{ route('panduan') }}">
                <i class="fas fa-file-video"></i> Panduan Upload Video
                </a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endpush
