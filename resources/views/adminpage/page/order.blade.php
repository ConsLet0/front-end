@extends('adminpage.layout.main')
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Daftar Pesanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Pesanan</li>
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

                        <!-- Default Tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="incomingorder-tab" data-bs-toggle="tab" data-bs-target="#incomingorder"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Pesanan Masuk</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="allorder-tab" data-bs-toggle="tab" data-bs-target="#allorder"
                                    type="button" role="tab" aria-controls="allorder"
                                    aria-selected="false">Semua Pesanan</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="myTabContent">
                            @include('adminpage.partials.incoming-order')
                            @include('adminpage.partials.all-order')
                        </div><!-- End Default Tabs -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
