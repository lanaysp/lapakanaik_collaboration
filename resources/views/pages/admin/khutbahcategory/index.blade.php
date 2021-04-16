@extends('layouts.dashboard')

@section('title')
    Dashboard Admin Khutbah Category
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">User</h2>
            <p class="dashboard-subtitle">
                List of Categories
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('khutbahcategory.create') }}" class="btn btn-primary mb-2">
                                <i class="fas fa-plus-circle"></i> Tambah Kategori
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
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
        // AJAX DataTablenn
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush



{{-- <!-- Section Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Blog Etnicode</h1>
          </div>
          <div class="section-body">
              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Posts</h4>
                  </div>
                  <div class="card-body">
                      <a href="{{ route('khutbahcategory.create') }}" class="btn btn-primary mb-3">
                            + Tambah Data Baru
                        </a>
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </section>
            </div> --}}



