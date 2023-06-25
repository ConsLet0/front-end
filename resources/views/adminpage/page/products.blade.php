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
                        <form action="/products" method="get">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <select id="menu_category" name="menu_category_id" class="form-select"
                                        aria-label="Default select example">
                                        <option disabled selected>Kategori Produk</option>
                                        <option value="" {{ empty($request->id) ? : '' }}>Semua Kategori
                                        </option>
                                        @foreach ($menu_categories as $mct)
                                            <option value="{{ $mct->id }}"
                                                {{ $request->id === $mct->id ? 'selected' : '' }}>{{ $mct->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info filter-button"><i
                                                class="bi bi-search"></i>
                                            Filter</button>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#addproducts"><i class="bi bi-plus-square"></i> Tambah
                                            Menu</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Jenis Menu</th>
                                    <th scope="col">Kategori Menu</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1; // Inisialisasi counter
                                @endphp
                                @foreach ($products as $product)
                                    {{-- Kategori foreach start --}}
                                    <tr>
                                        <th scope="row">{{ $counter }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->product_category->name }}</td>
                                        <td>{{ $product->menu_category->name }}</td>
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
                                    @php
                                        $counter++; // Increment counter setiap iterasi
                                    @endphp
                                @endforeach
                            </tbody>
                            
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('adminpage.modal.products.addproductsmodal')
@section('script')
    <script>
        // Fungsi untuk menangani perubahan pada dropdown menu_category
        document.getElementById('menu_category').addEventListener('change', function() {
            var menuCategoryId = this.value;
            // Lakukan penanganan sesuai kebutuhan, misalnya mengirim form atau membuat request AJAX
            console.log('Menu Category ID:', menuCategoryId);
            // Panggil fungsi filter disini
            filterData(menuCategoryId);
        });

        // Fungsi untuk menangani klik filter button
        document.querySelector('.filter-button').addEventListener('click', function() {
            var menuCategoryId = document.getElementById('menu_category').value;
            // Panggil fungsi filter disini
            filterData(menuCategoryId);
        });

        // Fungsi untuk menangani klik reset button
        document.querySelector('.reset-button').addEventListener('click', function() {
            var menuCategoryId = ''; // Kosongkan nilai menuCategoryId untuk menampilkan semua kategori
            // Panggil fungsi filter disini
            filterData(menuCategoryId);
        });

        // Fungsi untuk melakukan filter data berdasarkan menu category
        function filterData(menuCategoryId) {
            // Lakukan penanganan sesuai kebutuhan, misalnya mengirim form atau membuat request AJAX
            console.log('Filter by Menu Category ID:', menuCategoryId);
            // Implementasikan logika filter data di sini
        }
    </script>
@endsection
@endsection
