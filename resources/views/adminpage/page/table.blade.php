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
    </div><!-- End Page Title -->
@endsection
@section('content')
    <section class="section">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmeja"><i
            class="bi bi-plus-square"></i> Tambah Meja</button>
        <div class="row">
            <div class="col-lg-12">
                @if (session('erroradd'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ session('erroradd') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('successadd'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('successadd') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('editsuccess'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('editsuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('deletesuccess'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('deletesuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
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
                                            <a href="/edit_table/{{ $table->id }}">
                                                <button type="button" class="btn btn-primary"><i
                                                        class="bi bi-eye-fill"></i></button>
                                            </a>
                                            <a href="/delete_table/{{ $table->id }}"
                                                onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus meja ini?')) { window.location.href = '{{ url('/delete_table/' . $table->id) }}'; }">
                                                <button type="button" class="btn btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </a>
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
