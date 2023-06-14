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
                                    <button type="button" class="btn btn-warning"><i class="bi bi-list-check"></i> Semua Kategori</button>
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproducts"><i class="bi bi-plus-square"></i> Tambah Menu</button> --}}
                                </div>
                                <form action="/add_product" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="file" name="image" />
                                    <label for="file">choose a file</label>
                                    <input type="text" id="name" name="name">
                                    <label for="name">Name</label>
                                    <input type="text" id="description" name="description">
                                    <label for="description">Description</label>
                                    <input type="text" id="price" name="price">
                                    <label for="price">Price</label>
                                    <input type="text" id="quantity" name="quantity">
                                    <label for="quantity">Quantity</label>
                                    <select name="product_category" class="form-select" aria-label="Default select example">
                                        <option disabled selected>Jenis Produk</option>
                                        @foreach ($product_categories as $pct)
                                            <option value="{{ $pct->id }}">{{ $pct->name }}</option>
                                        @endforeach
                                    </select>
                                    <select name="menu_category" class="form-select" aria-label="Default select example">
                                        <option disabled selected>Jenis Menu</option>
                                        @foreach ($menu_categories as $mct)
                                            <option value="{{ $mct->id }}">{{ $mct->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit">Add</button>
                                </form>
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
                                    <th scope="col">Kategori</th>
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
                                            <img src="{{ asset('product/'.$product->image) }}" width="60px" alt="">
                                        </td>
                                        <td>${{ $product->price }}</td>
                                        <td>
                                            {{-- Looping Status --}}
                                            <strong class="text-success">Tersedia</strong>
                                            <strong class="text-danger">Habis</strong>
                                        </td>
                                        <td>
                                            {{-- Looping Kategori --}}
                                            <strong class="text-primary">{{ $product->menu_category->name }}</strong>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editproducts"><i class="bi bi-pencil-fill"></i></button>
                                        </td>
                                        <td>
                                            <a href="/delete_product/{{ $product->id }}">delete</a>
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
    @include('adminpage.modal.products.editproductsmodal')
@endsection
