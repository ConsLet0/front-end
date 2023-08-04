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
                            <span>Shop</span>
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
            @if (session('successdelete'))
                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                    {{ session('successdelete') }}
                </div>
            @elseif(session('errorcheckout'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ session('errorcheckout') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                        @if (empty($cart) || count($cart) == 0)
                        <div class="warn">
                            <h3>No Data</h3>
                        </div>
                        @else
                        <div class="shoping__cart__table">
                            <?php $total_price = 0; ?>
                            <?php $total_quantity = 0; ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Nama Produk</th>
                                        <th></th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $ct => $val)
                                        <?php $price = $val['price']; ?>
                                        <?php $p = number_format($val['price'], 0, ',', '.'); ?>
                                        <?php
                                        $subprice = $price * $val['quantity'];
                                        $sp = number_format($subprice, 0, ',', '.');
                                        ?>
                                        {{-- Start foreach product list --}}
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <h5>{{ $val['name'] }}</h5>
                                            </td>
                                            <td class="shoping__cart__item">
                                                <img src="{{ url('product/' . $val['image']) }}" style="width: 100px" alt="">
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ 'Rp ' . $p }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $val['quantity'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{ 'Rp ' . $sp }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="{{ route('remove_cart', $ct) }}">
                                                    <span class="icon_close"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        {{-- End foreach product list --}}
                                        <?php $total_price += $subprice; ?>
                                        <?php $total_quantity += $val['quantity']; ?>
                                    @endforeach
                                    <?php $tp = 'Rp ' . number_format($total_price, 0, ',', '.'); ?>
                                </tbody>                                
                            </table>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/category/1" class="primary-btn cart-btn">Lanjut Belanja</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Segarkan Halaman</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <form action="{{ route('checkout') }}">
                            <div class="shoping__discount">
                                <h5>Data Pemesan</h5>
                                <input class="checkout_name" type="text" name="name" placeholder="Masukkan Nama Anda">
                                <div class="shoping_discount">
                                    <select class="mt-2 checkout_dropdown" name="payment_method_id"
                                        class="shoping__continue">
                                        <option disabled selected>Metode Pembayaran</option>
                                        @foreach ($payment_method as $pm)
                                            <option value="{{ $pm->id }}">{{ $pm->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="mt-2 checkout_dropdown" name="table_id" class="shoping__continue">
                                        <option disabled selected>Nomor Meja</option>
                                        @foreach ($table as $tbl)
                                            <option value="{{ $tbl->id }}">{{ $tbl->no_table }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-2 shoping_discount">
                                    <button class="submit_checkout" type="submit">Checkout </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>{{ $tp }}</span></li>
                            <li>Total <span>{{ $tp }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    @endif
@endsection
