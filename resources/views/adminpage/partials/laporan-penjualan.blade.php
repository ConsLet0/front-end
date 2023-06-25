<!-- Recent Sales -->
<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Laporan Penjualan</h5>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="tanggalAwal" class="form-control" placeholder="Tangal Awal"
                            onfocusin="(this.type='date')" onfocusout="(this.type='text')" value="" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="tanggalAkhir" value="" class="form-control"
                            placeholder="Tangal Akhir" onfocusin="(this.type='date')" onfocusout="(this.type='text')"
                            required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">
                            <span class="fas fa-search"></span>
                            Cari
                        </button>
                        <a href="/homepage" class="btn btn-warning">
                            <span class="fa fa-refresh"></span>
                            Segarkan
                        </a>
                    </div>
                </div>
            </div>
            <table id="table_laporan_penjualan" class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Nomor Meja</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan_penjualan as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->table->no_table }}</td>
                            <td>Rp.{{ $order->total_price }}</td>
                            @if ($order->payment_method_id == 1)
                                <td>CASH</td>
                            @elseif ($order->payment_method_id == 2)
                                <td>DEBIT</td>
                            @endif
                            <td>{{ $order->created_at }}</td>
                            <td><a href="/download_bill/{{ $order->id }}"> <button type="button"
                                        class="btn btn-warning">Unduh Struk</button>
                                </a></td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <th scope="row">2</th>
                        <td>Bridie Kessler</td>
                        <td>2</td>
                        <td>CASH</td>
                        <td>CASHLESS</td>
                        <td>2023-03-13 15:32:57</td>
                        <td><a href=""><span class="badge bg-success">Download Bill</span></a></td>
                    </tr> --}}
                </tbody>
            </table>

        </div>

    </div>
</div><!-- End Recent Sales -->
<script>
    $('#table_laporan_penjualan').DataTable({
        responsive: true,
        lengthCase: true,
        autoWidth: true,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
    });
</script>
