@extends('layouts.dashboard')

@section('title')
    User
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
                            <a href="{{ route('user.create') }}" class="btn btn-primary ">
                                <i class="fas fa-plus-circle"></i> Tambah User
                            </a>
                            <a href="export_excel" class="btn btn-success my-3" target="_blank">
                                <i class="far fa-file-excel"></i> EXPORT EXCEL</a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Majelis</th>
                                            <th>Status</th>
                                            <!--<th>create_at</th>-->
                                            <th>Roles</th>
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
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'DT_RowIndex', searchable: false, orderable: false},
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'nama_majelis', name: 'nama_majelis' },
                { data: 'status', name: 'status',
                // { data: 'create_at', name: 'create_at',
                    orderable: false,
                    searcable: false,
                },
                { data: 'roles', name: 'roles' },
                { 
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ]
        })
    </script>
@endpush