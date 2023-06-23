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
            @foreach ($orders as $order)
            {{-- @dd($order) --}}
                {{-- Kategori foreach start --}}
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>
                        @if ($order->status == 0)
                            <button type="button" class="btn btn-danger" disabled>Pesanan
                                Masuk</button>
                            <p>{{ $order->created_at }}</p>
                        @elseif ($order->status == 1)
                            <button type="button" class="btn btn-danger" disabled>Pesanan Telah Dihidangkan</button>
                            <p>{{ $order->updated_at }}</p>
                        @elseif ($order->status == 2)
                            <button type="button" class="btn btn-danger" disabled>Pesanan Dibatalkan</button>
                            <p>{{ $order->updated_at }}</p>
                        @endif
                    </td>
                    <th scope="row">{{ $order->name }}</th>
                    <th scope="row">{{ $order->table->no_table }}</th>
                    <td>
                        <a href="/order_detail/{{ $order->id }}"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editcategory"><i class="ri ri-eye-line"></i></button></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deletecategory"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                {{-- Kategori foreach End --}}
            @endforeach
        </tbody>
    </table>
    <!-- End Table with stripped rows -->
</div>
