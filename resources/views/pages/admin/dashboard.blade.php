@extends('layouts.admin')

@section('title')
    Store Dashboard | Lapakanik
@endsection

@section('content')
 <!-- page content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Admin Dashboard</h2>
              <p class="dashboard-subtitle">
                Store Configuration!
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">
                        Customer
                      </div>
                      <div class="dashboard-card-subtitle">
                        {{ $customer }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">
                        Revenue
                      </div>
                      <div class="dashboard-card-subtitle">
                        Rp.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">
                        Transaction
                      </div>
                      <div class="dashboard-card-subtitle">

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    <!-- /end page -->

@endsection
