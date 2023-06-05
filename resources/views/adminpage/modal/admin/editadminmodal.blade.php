<div class="modal fade" id="editadmin" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Administrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAddkategori" class="form-kategori" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Nama Admin</strong></label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="[Old Value]">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Email Admin</strong></label>
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control" placeholder="[Old Value]">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Kata Sandi</strong></label>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="[Old Value]">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-warning">Edit Admin</button>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
