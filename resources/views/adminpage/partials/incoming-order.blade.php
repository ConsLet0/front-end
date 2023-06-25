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
            @php
                $counter = 1; // Inisialisasi counter
            @endphp
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $counter }}</th>
                    <td>
                        @if ($order->status == 0)
                            <button type="button" class="btn btn-primary" disabled>Pesanan
                                Masuk</button>
                            <p>{{ $order->created_at }}</p>
                        @elseif ($order->status == 1)
                            <button type="button" class="btn btn-success" disabled>Pesanan Telah Dihidangkan</button>
                            <p>{{ $order->updated_at }}</p>
                        @elseif ($order->status == 2)
                            <button type="button" class="btn btn-danger" disabled>Pesanan Dibatalkan</button>
                            <p>{{ $order->updated_at }}</p>
                        @endif
                    </td>
                    <th scope="row">{{ $order->name }}</th>
                    <th scope="row">{{ $order->table->no_table }}</th>
                    <td>
                        <a href="/order_detail/{{ $order->id }}"><button type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#editcategory"><i
                                    class="ri ri-eye-line"></i></button></a>
                        <a href="/delete_order/{{ $order->id }}"
                            onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) { window.location.href = '{{ url('/delete_order/' . $order->id) }}'; }">
                            <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </a>
                    </td>
                </tr>
                @php
                    $counter++; // Increment counter setiap iterasi
                @endphp
            @endforeach
        </tbody>
    </table>
    <!-- End Table with stripped rows -->
</div>
