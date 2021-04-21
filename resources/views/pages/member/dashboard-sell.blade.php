@extends('layouts.member')

@section('title')
    Beli alat Hadroh
@endsection

@push('addon-style')
    <style>
        #link {
            color : #FFB60C !important ;
        }
        #text-info span {
    display: block;
    padding: 10px 15px;
    text-align: center;
    font-weight: 700;
    margin: 15px 0;
    border-radius: .5rem;
    }
    #text-info span.yes {
        background: #c6ffc5;
        color: #0ea904;
    }
    #text-info span.no {
        background: #ffc5c5;
        color: #ce0404;
    }

    </style>
@endpush

@section('content')
 <!-- page content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Beli Hadroh</h2>
              <p class="dashboard-subtitle">

              </p>
            </div>
            <div class="dashboard-content">
              <div class="card">
                    <div class="card-header">
                        <a href="/pdf/katalog.pdf" class="btn btn-success float-right"><i class="fas fa-print"></i> Download Katalog</a>
                    </div>
                <div class="card-body rounded">
                    {{-- form --}}
                            <form class="whatsapp-form">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control validate" id="nama" value="{{ $user->name }}" required>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control validate" id="email" value="{{ $user->email }}" required>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="exampleInputEmail1">No Telp/Wa</label>
                                        <input type="number" class="form-control" id="hp" value="{{ $user->wa_majelis }}" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Pesanan</label>
                                        <select name="paket" id="paket" class="form-control validate" required>
                                            <option hidden='hidden' selected='selected' value='default'>Pilih Paket</option>
                                            <option value="FULLSET">FULLSET</option>
                                            <option value="SATUAN">SATUAN</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Nama Produk</label>
                                        <select name="produk" id="produk" class="form-control validate" required>
                                            <option hidden='hidden' selected='selected' value='default'>Pilih Produk</option>
                                            <option value="HABSYI">HABSYI</option>
                                            <option value="AL BANJARI">AL BANJARI</option>
                                            <option value="QASIDAH LASQI">QASIDAH LASQI</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Request Warna</label>
                                         <input type="color" name="color" id="color" class="form-control validate" required>
                                    </div>
                                <fieldset class="form-group col-6 mt-4">
                                    <legend class="col-form-label col-sm-2 float-sm-left pt-0">Model</legend>
                                    <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="model" id="model" value="Ukiran">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Ukiran
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="model" id="model" value="Polos">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Polos
                                        </label>
                                        </div>
                                    </div>
                                </fieldset>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control validate" id="alamat" name="alamat" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Catatan</label>
                                    <textarea class="form-control validate" id="catatan" name="catatan" rows="3" placeholder="isi jika ada catatan tambahan" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <span>NB: Pesanan anda akan dirangkum lebih lanjut oleh tim Lapakanik melalui whatsapp.</span>
                                </div>

                                <a class="send_form btn btn-primary float-right" href="javascript:void" type="submit" title="Pesan Sekarang">Pesan Sekarang</a>
                                <div id="text-info"></div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    <!-- /end page -->

@endsection


@push('addon-script')
<script>
   $(document).on('click','.send_form', function(){
var input_blanter = document.getElementById('alamat');

/* Whatsapp Settings */
var walink = 'https://web.whatsapp.com/send',
    phone = '6285156596073',
    walink2 = 'Halo saya ingin memesan alat musik hadroh dengan keterangan sebagai berikut ',
    text_yes = 'Terkirim.',
    text_no = 'Isi semua Formulir lalu klik Pesan Sekarang.';

/* Smartphone Support */
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
var walink = 'whatsapp://send';
}

if("" != input_blanter.value){

 /* Call Input Form */
var input_select1 = $("#paket :selected").text(),
    input_select2 = $("#produk :selected").text(),
    input_name1 = $("#nama").val(),
    input_model1 = $("#model").val(),
    input_warna1 = $("#color").val(),
    input_email1 = $("#email").val(),
    input_hp1 = $("#hp").val(),
    input_textarea1 = $("#alamat").val(),
    input_textarea2 = $("#catatan").val();

/* Final Whatsapp URL */
var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
    '*Name* : ' + input_name1 + '%0A' +
    '*Email Address* : ' + input_email1 + '%0A' +
    '*No Telp/Wa* : ' + input_hp1 + '%0A' +
    '*Paket* : ' + input_select1 + '%0A' +
    '*Produk* : ' + input_select2 + '%0A' +
    '*Warna* : ' + input_warna1 + '%0A' +
    '*Model* : ' + input_model1 + '%0A' +
    '*Alamat* : ' + input_textarea1 + '%0A' +
    '*Catatan* : ' + input_textarea2 + '%0A' ;

/* Whatsapp Window Open */
window.open(blanter_whatsapp,'_blank');
document.getElementById("text-info").innerHTML = '<span class="yes">'+text_yes+'</span>';
} else {
document.getElementById("text-info").innerHTML = '<span class="no">'+text_no+'</span>';
}
});
</script>

@endpush
