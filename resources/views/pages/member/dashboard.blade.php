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

                        </div>
                </div>
            </div>
        </div>
    <!-- /end page -->

@endsection
