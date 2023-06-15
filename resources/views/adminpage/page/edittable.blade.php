@extends('adminpage.layout.main')
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Menu Meja</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Edit Meja {{ $table->no_table }}</li>
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
                @if (session('erroradd'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ session('erroradd') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">Meja Nomor {{ $table->no_table }}</h5>
                    <form action="{{ url('/edit_table', $table->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Meja</label>
                            <div class="col-sm-10 form-label">
                                <input class="form-control" type="number" name="no_table" id="no_table"
                                    value="{{ $table->no_table }}" />
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" value="submit" class="btn btn-primary">
                                Submit
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
