@extends('adminpage.layout.main')
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Meja Makan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Meja</li>
                <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
            </ol>
        </nav>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmeja"><i class="bi bi-plus-square"></i> Tambah Meja</button>
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
                                    <th scope="col">No Meja</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tables as $table)
                                    {{-- Kategori foreach start --}}
                                    <tr>
                                        <th scope="row">{{ $table->id }}</th>
                                        <td>{{ $table->no_table }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmeja"><i class="ri ri-eye-fill"></i></button>
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
    @include('adminpage.modal.meja.addmejamodal')
    @include('adminpage.modal.meja.editmejamodal')
@endsection
  
