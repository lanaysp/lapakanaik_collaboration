@extends('layouts.member')

@section('title')
  Kotak Saran
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Kotak Saran</h2>
      <p class="dashboard-subtitle">
        Kotak Saran Lapakanik Colaburation
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                Jika ada saran untuk Lapakanik Collaboration bisa tulis saran dibawah
            </div>
            <div class="card-body" >
                <form class="whatsapp-form">
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                        <label for="name">Nama Member</label>
                        <input type="text" class="form-control" id="wa_name" name="name" required="" aria-describedby="nama member" value="{{ $user->name }}">
                    </div>
                    <div class="form-group col-lg-6 col-12">
                        <label for="email">Email Member</label>
                        <input type="text" class="form-control" id="wa_email" name="email" value="{{ $user->email }}">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class="form-control" name="pesan" id='wa_textarea' cols="30" rows="10" required></textarea>
                    </div>
                    <a class="send_form btn btn-primary float-right" href="javascript:void" type="submit" title="Send to Whatsapp"><i class="fas fa-headset"></i> Kirim Saran</a>
                    {{-- <div id="text-info"></div> --}}
                </form>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
    <script>
        $(document).on('click','.send_form', function(){
var input_blanter = document.getElementById('wa_textarea');

/* Whatsapp Settings */
var walink = 'https://web.whatsapp.com/send',
    phone = '6282260000513',
    walink2 = 'Assalamu alaikum Lapakanik, saya butuh bantuan terkait upload video, berikut data diri saya:  ',
    text_yes = 'Terkirim.',
    text_no = 'Isi semua Formulir lalu klik Kirim.';

/* Smartphone Support */
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
var walink = 'whatsapp://send';
}

if("" != input_blanter.value){

 /* Call Input Form */
var input_select1 = $("#wa_select :selected").text(),
    input_name1 = $("#wa_name").val(),
    input_email1 = $("#wa_email").val(),
    input_textarea1 = $("#wa_textarea").val();

/* Final Whatsapp URL */
var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
    '*Name* : ' + input_name1 + '%0A' +
    '*Email Address* : ' + input_email1 + '%0A' +
    '*Description* : ' + input_textarea1 + '%0A';

/* Whatsapp Window Open */
window.open(blanter_whatsapp,'_blank');
document.getElementById("text-info").innerHTML = '<span class="yes">'+text_yes+'</span>';
} else {
document.getElementById("text-info").innerHTML = '<span class="no">'+text_no+'</span>';
}
});
    </script>
@endpush
