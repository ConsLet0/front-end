<div class="tab-pane fade show active" id="incomingorder" role="tabpanel" aria-labelledby="incomingorder-tab">
    <!-- Table with stripped rows -->
    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Status</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">No Meja</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Kategori foreach start --}}
            <tr>
                <th scope="row">1</th>
                <td>
                    <button type="button" class="btn btn-danger" disabled>Pesanan
                        Masuk</button>
                    <p>05-Jun-2023 22:08</p>
                </td>
                <th scope="row">Jonathan Frizi</th>
                <th scope="row">1</th>
                <td>
                    <a href="/detailorder/incoming"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editcategory"><i class="ri ri-eye-line"></i></button></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deletecategory"><i class="bi bi-trash3"></i></button>
                </td>
            </tr>
            {{-- Kategori foreach End --}}
        </tbody>
    </table>
    <!-- End Table with stripped rows -->
</div>
