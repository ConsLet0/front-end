@extends('adminpage.layout.main')
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Order</h5>

                        <!-- Horizontal Form -->
                        <form>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pemesan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputAddres5s"
                                        placeholder="[Nama Pemesan]" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Meja</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputAddres5s" placeholder="1" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Produk & Jumlah</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>
                                        2 Cheescake
                                        2 Iced Tea
                                    </textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputState" class="form-label">Status Pesanan</label>
                                <select id="inputState" class="form-select">
                                    <option selected disabled>Ubah Status</option>
                                    <option>Pesanan Dibatalkan</option>
                                    <option>Pesanan Masuk</option>
                                    <option>Pesanan Dihidangkan</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Unduh Struk Pesanan</label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-warning">Struk Pesanan</button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <button type="submit" class="btn btn-success">
                                    Perbarui Data Pesanan
                                </button>
                            </div>
                        </form>
                        <!-- End Horizontal Form -->
                    </div>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
