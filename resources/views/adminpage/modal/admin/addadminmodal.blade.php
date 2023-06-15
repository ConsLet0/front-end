<div class="modal fade" id="addadmin" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Administrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_admin" id="formAddkategori" class="form-kategori" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Nama Admin</strong></label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Admin !">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Email Admin</strong></label>
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email Admin !">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for=""><strong>Kata Sandi</strong></label>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Kata Sandi !">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
