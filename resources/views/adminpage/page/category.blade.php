@extends('adminpage.layout.main')
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Menu Kategori</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Category</li>
                <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
            </ol>
        </nav>
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategory"><i class="bi bi-plus-square"></i> Tambah Kategori</button> --}}
    </div><!-- End Page Title -->
@endsection
@section('content')
    <section class="section">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategory"><i
                class="bi bi-plus-square"></i> Tambah Kategori</button>
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
                @elseif(session('successedit'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('successedit') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('successdelete'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('successdelete') }}
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
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Jenis Produk</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1; // Inisialisasi counter
                                @endphp
                                @foreach ($menu_categories as $ct)
                                    {{-- Kategori foreach start --}}
                                    <tr>
                                        <th scope="row">{{ $counter }}</th>
                                        <td>{{ $ct->name }}</td>
                                        <td>
                                            {{ $ct->product_category->name }}
                                        </td>
                                        <td>
                                            <a href="/edit_category_page/{{ $ct->id }}">
                                                <button type="button" class="btn btn-primary"><i
                                                        class="bi bi-eye-fill"></i></button>
                                            </a>
                                            <a href="/delete_menu_category/{{ $ct->id }}" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus kategori ini?')) { window.location.href = '{{ url('/delete_menu_category/'.$ct->id) }}'; }">
                                                <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </a>  
                                        </td>
                                    </tr>
                                    @php
                                        $counter++; // Increment counter setiap iterasi
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('adminpage.modal.category.addcategorymodal')
@endsection
