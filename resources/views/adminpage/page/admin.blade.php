@extends('adminpage.layout.main')
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Menu Tambah Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Admin</li>
                <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
            </ol>
        </nav>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addadmin"><i class="bi bi-plus-square"></i> Tambah Admin</button>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    {{-- Kategori foreach start --}}
                                    <tr>
                                        <th scope="row">{{ $admin->id }}</th>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editadmin"><i class="bi bi-pencil-fill"></i></button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteadmin"><i class="bi bi-trash3"></i></button>
                                        </td>
                                    </tr>
                                    {{-- Kategori foreach End --}}
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('adminpage.modal.admin.addadminmodal')
    @include('adminpage.modal.admin.editadminmodal')
    @include('adminpage.modal.admin.deleteadminmodal')
@endsection
