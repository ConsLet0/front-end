@extends('adminpage.layout.main')
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Menu Makanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Products</li>
                <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <section class="section">
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
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <select class="form-select" aria-label="Default select example">
                                    <option disabled selected>Jenis Menu</option>
                                    <option value="1">Makanan</option>
                                    <option value="2">Minuman</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" aria-label="Default select example">
                                    <option disabled selected>Kategori</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="button" class="btn btn-info"><i class="bi bi-search"></i> Filter</button>
                                    <button type="button" class="btn btn-warning"><i class="bi bi-list-check"></i> Semua
                                        Kategori</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addproducts"><i class="bi bi-plus-square"></i> Tambah Menu</button>
                                </div>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Jenis Menu</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    {{-- Products foreach start --}}
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->product_category->name }}</td>
                                        <td>
                                            <img src="{{ asset('product/' . $product->image) }}" width="60px"
                                                alt="">
                                        </td>
                                        <td>${{ $product->price }}</td>
                                        <td>
                                            {{-- Looping Status --}}
                                            @if ($product->status == 1)
                                                <strong class="text-success">Tersedia</strong>
                                            @elseif ($product->status == 2)
                                                <strong class="text-danger">Habis</strong>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/edit_product_page/{{ $product->id }}">
                                                <button type="button" class="btn btn-primary"><i
                                                        class="bi bi-eye-fill"></i></button>
                                            </a>
                                            <a href="/delete_product/{{ $product->id }}"
                                                onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus kategori ini?')) { window.location.href = '{{ url('/delete_product/' . $product->id) }}'; }">
                                                <button type="button" class="btn btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    {{-- Products foreach end --}}
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('adminpage.modal.products.addproductsmodal')
@endsection
