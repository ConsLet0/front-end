@extends('adminpage.layout.main')
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Menu Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Edit Produk {{ $products->name }}</li>
                <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
            </ol>
        </nav>
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategory"><i class="bi bi-plus-square"></i> Tambah Kategori</button> --}}
    </div><!-- End Page Title -->
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <div class="card">
                @if (session('erroredit'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ session('erroredit') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form action="{{ url('/edit_product', $products->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12 mb-2">
                                <label for="name"><strong>Nama</strong></label>
                                <div class="form-group">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="{{ $products->name }}">
                                    <span class="text-danger error-text name_error" role="alert"></span>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="description"><strong>Description</strong></label>
                                <div class="col-sm-10">
                                    <textarea type="text" id="description" name="description" class="form-control" style="height: 100px"
                                        placeholder="{{ $products->description }}"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="product_category"><strong>Jenis</strong></label>
                                <select name="product_category" class="form-select" aria-label="Default select example">
                                    @foreach ($product_categories as $products)
                                        @if (old('product_category', $products->category_id) == $products->id)
                                            <option value="{{ $products->id }}" selected>{{ $products->name }}</option>
                                        @endif
                                        <option value="{{ $products->id }}">{{ $products->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="menu_category"><strong>Kategori</strong></label>
                                <select name="menu_category" class="form-select" aria-label="Default select example">
                                    @foreach ($menu_categories as $mct)
                                        @if (old('menu_category', $mct->category_id) == $mct->id)
                                            <option value="{{ $mct->id }}" selected>{{ $mct->name }}</option>
                                        @endif
                                        <option value="{{ $mct->id }}">{{ $mct->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="file"><strong>Foto</strong></label>
                                <div class="form-group">
                                    <input type="file" id="file" name="image" class="form-select" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="price"><strong>Harga</strong></label>
                                <div class="form-group">
                                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $products->price) }}">
                                    <span class="text-danger error-text name_error" role="alert"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="status"><strong>Status</strong></label>
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option disabled selected>
                                    @if ($products->status == 1)
                                        Tersedia
                                    @endif
                                    Tidak Tersedia
                                </option>
                                <option value="1">Tersedia</option>
                                <option value="2">Tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" value="submit" class="btn btn-success">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script></script>
@endsection
