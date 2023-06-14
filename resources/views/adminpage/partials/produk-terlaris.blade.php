<!-- Top Selling -->
<div class="col-12">
    <div class="card top-selling overflow-auto">

        <div class="card-body pb-0">
            <h5 class="card-title">Produk Terlaris</h5>

            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Gambar Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Start foreach produk terlaris --}}
                    <tr>
                        <th scope="row"><a href="#"><img src="{{ asset('adminpage/img/product-1.jpg') }}"
                                    alt=""></a></th>
                        <td>Cappucino</td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                    </tr>
                    {{-- End foreach produk terlaris --}}
                </tbody>
            </table>

        </div>
    </div>
</div><!-- End Top Selling -->
