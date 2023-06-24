<div class="tab-pane fade" id="allorder" role="tabpanel" aria-labelledby="allorder-tab">
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
            @foreach ($orders as $order)
                {{-- Kategori foreach start --}}
                <tr>
                    <th scope="row">{{ $order->order_id }}</th>
                    <td>
                        <button type="button" class="btn btn-success" disabled>Pesanan
                            Selesai</button>
                        <p>05-Jun-2023 22:08</p>
                    </td>
                    <th scope="row">{{ $order->name }}</th>
                    <th scope="row">{{ $order->table_id }}</th>
                    <td>
                        <a href="/detailorder/all"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editcategory"><i class="ri ri-eye-line"></i></button></a>
                        <a href="/delete_order/{{ $order->id }}" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) { window.location.href = '{{ url('/delete_order/'.$order->id) }}'; }">
                            <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </a>
                    </td>
                </tr>
                {{-- Kategori foreach End --}}
            @endforeach
        </tbody>
    </table>
    <!-- End Table with stripped rows -->
</div>
