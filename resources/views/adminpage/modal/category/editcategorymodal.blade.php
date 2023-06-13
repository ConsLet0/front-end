<div class="modal fade" id="editcategory" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/edit_menu_category" id="formAddkategori" class="form-kategori" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Masukkan nama baru (kosongkan jika tidak)</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php
                                    $product_categories = DB::table('product_categories')->
                                    orderBy('name','desc')
                                    ->get();
                                ?>
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option disabled selected>Jenis Produk</option>
                                        @foreach ($product_categories as $ct)
                                            <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Edit Kategori</button>
                    </div>
                    <div class="mt-3 mb-3">
                        <label class="mb-2">Hapus Kategori</label>
                        <button type="button" class="btn btn-danger col-md-12" data-bs-dismiss="modal">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
