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
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $ct => $val)
                                        <?php $price = $val['price']; ?>
                                        <?php $p = number_format($val['price'], 0, ',', '.'); ?>
                                        <?php
                                        $subprice = $p * $val['quantity'];
                                        
                                        $sp = number_format($subprice, 0, ',', '.');
                                        ?>
                                        {{-- Start foreach product list --}}
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ url('product/' . $val['image']) }}" alt="">
                                                <h5>{{ $val['name'] }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                ${{ $p }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $val['quantity'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                ${{ $sp }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="{{ route('remove_cart', $ct) }}">
                                                    <span class="icon_close"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        {{-- End foreach product list --}}
                                        <?php $total_price += $sp; ?>
                                        <?php $total_quantity += $val['quantity']; ?>
                                    @endforeach
                                    <?php $tp = number_format($total_price, 0, ',', '.'); ?>
                                </tbody>
                            </table>

                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/product" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" onclick="refreshPage()" class="primary-btn cart-btn cart-btn-right"><span
                                class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>${{ $tp }}</span></li>
                            <li>Total <span>${{ $tp }}</span></li>
                        </ul>
                        <form action="{{ route('checkout') }}" enctype="multipart/form-data">
                            <input type="text" name="name" placeholder="Input Your Name">
                            <select name="payment_method_id" class="form-select" aria-label="Default select example">
                                <option disabled selected>Payment Method</option>
                                @foreach ($payment_method as $pm)
                                    <option value="{{ $pm->id }}">{{ $pm->name }}</option>
                                @endforeach
                            </select>
                            <select name="table_id" class="form-select" aria-label="Default select example">
                                <option disabled selected>No_Table</option>
                                @foreach ($table as $tbl)
                                    <option value="{{ $tbl->id }}">{{ $tbl->no_table }}</option>
                                @endforeach
                            </select>
                            <button type="submit">PROCEED TO CHECKOUT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    @endif
@endsection
