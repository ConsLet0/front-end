<div class="modal fade" id="editcategory" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/edit_menu_category" id="formAddkategori" class="form-kategori" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Old Name">
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php
                                    $product_categories = DB::table('product_categories')->
                                    orderBy('name','desc')
                                    ->get();
                                ?>
                                <select name="product_category" id="ProductCategory" required>
                                    @foreach($product_categories as $ct)
                                        <option value="{{$ct->id}}">{{$ct->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text name_error" role="alert"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Edit Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
