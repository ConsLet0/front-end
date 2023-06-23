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
                            <span>Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <!-- Product Details Section Begin -->
    {{-- @dd($product) --}}
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{ url('product/'. $product->image) }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="{{ route('add_to_cart', ['id' => $product->id]) }}">

                        <div class="product__details__text">
                            <h3>{{ $product->name }}</h3>
                            <div class="product__details__price">${{ $product->price }}</div>
                            <p>{{ $product->description }}</p>
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input name="quantity" type="text" value="1">
                                    </div>
                                </div>
                            </div>
                            <button type="submit">
                                ADD TO CART
                            </button>
                            <ul>
                                <li><b>Availability</b> <span>In Stock</span></li>
                                <li><b>Weight</b> <span>0.5 kg</span></li>
                            </ul>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
@endsection
