@extends('userpage.layout.main')
@section('banner')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('userpage/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('upper-content')
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Customer Name<span>*</span></p>
                                <input type="text" placeholder="Input Your Name" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Customer Email<span>*</span></p>
                                <input type="text" placeholder="Input Your Email" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Payment Method<span>*</span></p>
                                <select class="checkout__input">
                                    <option value="1">Cash</option>
                                    <option value="2">Debit</option>
                                    <option value="3">Cashless</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    {{-- Start foreach product list --}}
                                    <li>Vegetable’s Package <span>$75.99</span></li>
                                    {{-- End foreach product list --}}
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>
                                <div class="checkout__order__total">Total <span>$750.99</span></div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
