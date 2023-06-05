<div class="modal fade" id="addproducts" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="" class="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Nama</strong></label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Kategori !">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Jenis</strong></label>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled selected>Jenis Menu</option>
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Kategori</strong></label>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled selected>Kategori Menu</option>
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Foto</strong></label>
                            <div class="form-group">
                                <input type="file" name="photo" id="photo" class="form-control">
                            </div>
                        </div>
                        {{-- Preview Image --}}
                        {{-- <div class="col-md-12 mb-2">
                            <img src="{{ asset('adminpage/img/product-5.jpg') }}" width="80px" alt="">
                        </div> --}}
                        {{--  --}}
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Harga</strong></label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Kategori !">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Status</strong></label>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled selected>Status Menu</option>
                                <option value="1">Tersedia</option>
                                <option value="2">Habis</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
