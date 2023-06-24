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
                        {{-- @dd($order->name) --}}

                        <!-- Horizontal Form -->
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pemesan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAddres5s"
                                    placeholder="{{ $order->name }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Meja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAddres5s"
                                    placeholder="{{ $order->table->no_table }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Produk & Jumlah</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" disabled>
                                        @foreach ($order_detail as $item)
                                            {{ $item->product->name }}
                                        @endforeach
                                    </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Unduh Struk Pesanan</label>
                            <div class="col-sm-10">
                                <a href="/download_bill/{{ $order->id }}">
                                    <button type="button" class="btn btn-warning">Unduh Struk</button>
                                </a>
                            </div>
                        </div>
                        @if ($order->status == 0)
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Aksi Pesanan</label>
                                <div class="col-md-2">
                                    <form action="/finish_order" method="POST">
                                        @csrf
                                        <input type="text" value="{{ $order->id }}" name="order_id" hidden>
                                        <button type="submit" class="btn btn-success">
                                            Terima Pesanan
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-2">
                                    <form action="/cancel_order" method="POST">
                                        @csrf
                                        <input type="text" value="{{ $order->id }}" name="order_id" hidden>
                                        <button type="submit" class="btn btn-danger">
                                            Batalkan Pesanan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <label for="inputState" class="form-label">Status Pesanan</label>
                            @if ($order->status == 0)
                                <button disabled type="button" class="btn btn-primary">Pesanan Masuk</button>
                            @elseif ($order->status == 1)
                                <button disabled type="button" class="btn btn-success">Pesanan Selesai</button>
                            @elseif ($order->status == 2)
                                <button disabled type="button" class="btn btn-danger">Pesanan Dibatalkan</button>
                            @endif
                        </div>
                        <!-- End Horizontal Form -->
                    </div>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
