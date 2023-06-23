@extends('userpage.layout.main')
@section('banner')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('userpage/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Starsbug Coffee</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Status</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Customer Name</th>
                                    <th>Status</th>
                                    <th>Bill</th>
                                    <th>Order Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($order->order_id) --}}
                                {{-- @foreach ($order as $item) --}}
                                {{-- @dd($item) --}}
                                    {{-- Start foreach product list --}}
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <h5>{{ $order->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            @if ($order->status == 0)
                                                On Proccess
                                            @elseif ($order->status == 1)
                                                Finished
                                            @endif
                                        </td>
                                        <td>
                                            ${{ $order->total_price }}
                                        </td>
                                        <td>
                                            <a href="/download_bill/{{ $order->id }}"><span class="badge bg-success">Download Bill</span></a>
                                        </td>
                                        {{-- <td class="shoping__cart__quantity">
                                            <button type="button" class="btn btn-warning">Download Bill</button>
                                        </td> --}}
                                    </tr>
                                    {{-- End foreach product list --}}
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
