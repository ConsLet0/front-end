<div class="modal fade" id="editmeja" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Meja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAddkategori" class="form-kategori" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Old Name">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-warning">Edit Meja</button>
            </div>
            <div class="modal-footer mt-3 mb-3">
                <label class="col-md-12 mb-2">Hapus Meja</label>
                <button type="button" class="btn btn-danger col-md-12" data-bs-dismiss="modal">Hapus</button>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
