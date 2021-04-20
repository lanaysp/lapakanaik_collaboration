@extends('layouts.member')

@section('title')
    Beli alat Hadroh
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
              <h2 class="dashboard-title">Beli Hadroh</h2>
              <p class="dashboard-subtitle">
                Harga Sepesial Untuk Member Chalenge Lapakanil
              </p>
            </div>
            <div class="dashboard-content">
              <div class="card">
                <div class="card-body rounded">
                    {{-- form --}}
                            <form>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control" id="nama" aria-describedby="nama">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email">
                                    </div>
                                    {{-- <div class="form-group col-6">
                                        <label for="exampleInputEmail1"></label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Catatan</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success float-right">Kirim Pesanan</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    <!-- /end page -->

@endsection


@push('addon-script')

@endpush
