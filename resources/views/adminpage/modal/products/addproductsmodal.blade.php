<div class="modal fade" id="addproducts" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="name"><strong>Nama</strong></label>
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Masukan Nama produk !">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="description"><strong>Description</strong></label>
                            <div class="form-group">
                                <input type="text" id="description" name="description" class="form-control"
                                    placeholder="Masukan Deskripsi Produk !">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="product_category"><strong>Jenis</strong></label>
                            <select name="product_category" class="form-select" aria-label="Default select example">
                                <option disabled selected>Jenis Produk</option>
                                @foreach ($product_categories as $pct)
                                    <option value="{{ $pct->id }}">{{ $pct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="menu_category"><strong>Kategori</strong></label>
                            <select name="menu_category" class="form-select" aria-label="Default select example">
                                <option disabled selected>Kategori Produk</option>
                                @foreach ($menu_categories as $mct)
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
                                <input type="number" id="price" name="price" class="form-control"
                                    placeholder="Masukan Harga Produk !">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="status"><strong>Status</strong></label>
                        <select name="status" class="form-select" aria-label="Default select example">
                            <option disabled selected>Status Produk</option>
                            <option value="1">Tersedia</option>
                            <option value="2">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End Vertically centered Modal-->
</div>
