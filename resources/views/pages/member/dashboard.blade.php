@extends('layouts.member')

@section('title')
    Dashboard Member
@endsection

@push('addon-style')
    <style>
        #link {
            color : #FFB60C !important ;
        }
    </style>
@endpush

@section('content')
 <!-- page content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Member Dashboard</h2>
              <p class="dashboard-subtitle">
                Dashboard Member
              </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="container text-center mt-4">
                        <div class="col-lg-12">
                            <h4>PROGRAM LAPAKANIK MULTIGUNA NUSANTARA</h4>
                            <hr>
                            <img src="/images/logos.png" class="img-fluid mb-3" alt="" > <br>
                            <p class="text-left">
                            <a id="link" href="https://www.lapakanik.com/"><strong>Lapakanik Multiguna Nusantara</strong></a>
                            merupakan industri profesional yang
                            fokus bergerak dalam bidang produksi dan penjualan <br><b><u>Alat Musik Tradisional Rebana Hadroh di Jepara</u></b>.
                            Produksi Lapakanik hanya fokus mengeluarkan alat hadroh dengan kualitas terbaik agar bisa memudahkan
                            pertumbuhan majelis di Indonesia menjadi lebih maksimal. Cek produk kami di <a id="link" href="https://www.lapakanik.co.id/"><b>Toko Online Lapakanik</b></a>. <br>
                            Alhamdulillah perusahaan Lapakanik berhasil mengeluarkan beberapa Program yang akan mempermudah pertumbuhan Majelis
                            anda semakin cepat dan efektif. Berikut Program yang saat ini sudah resmi kami Launching:
                            </p>
                            <ol class="text-left">
                                <strong>1. PROGRAM MEMBERSHIP </strong>
                            </ol>
                            <p class="text-left">
                                <b>Membership Lapakanik</b> merupakan sebuah program kerjasama antara produksi Lapakanik dan anda yang ingin mendapat penghasilan tambahan bahkan utama dengan profit tinggi.
                                Anda bisa ikut memasarkan produk alat musik rebana hadroh siap jual dengan keuntungan tinggi.
                                Tim Lapakanik sudah menyiapkan bahan-bahan promosi hingga kelas internet marketing untuk kalian yang masih awam dalam dunia online. Cek selengkapnya di Website <a id="id" href="https://www.kelas.lapakanik.com/"><b>Kelas Lapakanik Nusantara</b></a>.
                            </p>
                            <ol class="text-left">
                                <strong>2. PROGRAM LAPAKANIK COLLABORATION</strong>
                            </ol>
                            <p class="text-left">
                                <a id="link" href="https://video.lapakanik.co.id/"><b>Lapakanik Collaboration</b></a> adalah program kolaborasi dimana sahabat semua yang memiliki rekaman video penampilan / Latihan majelis Berkesempatan memperluas jaringan majelis melalui online digital. <p class="text-left">
                                Tim Lapakanik akan membantu majelis anda dikenal lebih luas melalui asset digital Lapakanik seperti Instagram, Facebook, Youtube hingga Website. Anda cukup siapkan video terbaik penampilan majelis atau Latihan hadroh, tim Lapakanik akan bantu editing dan promosikan video anda secara <b>GRATIS</b> tanpa biaya sepeserpun.
                                Untuk bisa memanfaatkan program ini, anda bisa klik <b>KIRIM VIDEO SEKARANG</b>
                            </p>
                            <ol class="text-left">
                                <strong>3. PROGRAM LAPAKANIK CHALLENGE </strong>
                            </ol>
                            <p class="text-left">
                                <a id="link" href="https://www.challenge.lapakanik.co.id/"><b>Challenge Lapakanik </b></a>Merupakan program pengembangan Majelis Sholawat di Nusantara
                                melalui media online. Lomba Sholawat Online ini diadakan untuk mempermudah majelis dalam mensyiarkan dakwah melalui seni tradisional alat musik rebana hadroh.
                                Dimanapun tempat anda, kini bisa ikut serta meramaikan <b>Challenge Lapakanik</b> sesuai jadwal lomba yang sudah kami tentukan. Jadi tunggu apalagi, pantau terus jadwalnya di website <a id="link" href="https://www.challenge.lapakanik.co.id/"><b>Lapakanik Challenge </b></a>.
                            </p>
                            <hr class="">
                            <div class="col-8 offset-2 mb-4">

                            @forelse ($medsos as $sosial)

                                <a target="_blank" rel="noopener noreferrer" href=" {{ $sosial->ig }}"
                                ><img class="sosial-media" src="/images/logo-medsos/instagram.png" alt=""
                                /></a>

                                <a target="_blank" rel="noopener noreferrer" href="{{ $sosial->fb }}"
                                ><img class="sosial-media" src="/images/logo-medsos/facebook.png" alt=""
                                /></a>

                                <a target="_blank" rel="noopener noreferrer" href="{{ $sosial->yt }}"
                                ><img class="sosial-media" src="/images/logo-medsos/youtube.png" alt=""
                                /></a>

                                <a target="_blank" rel="noopener noreferrer" href="{{ $sosial->tw }}"
                                ><img class="sosial-media" src="/images/logo-medsos/twitter.png" alt=""
                                /></a>
                                <a target="_blank" rel="noopener noreferrer" href="{{ $sosial->tt }}"
                                ><img class="sosial-media" src="/images/logo-medsos/tiktok.png" alt=""
                                /></a>
                            @empty

                            @endforelse
                            </div>
                        </div>
                </div>
            </div>
        </div>
    <!-- /end page -->

@endsection
