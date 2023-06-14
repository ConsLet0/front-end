@extends('userpage.layout.main')
@section('banner')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('userpage/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Product Menu</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('upper-content')
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categories</span>
                        </div>
                        <ul>
                                @foreach ($menu_category as $mct)
                                {{-- Start foreach category --}}
                                    <li><a href="/menu/{{ $mct->id }}">{{ $mct->name }}</a></li>
                                {{-- End foreach category --}}
                                @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6>
                                        <span>{{ $products->count() }}</span>
                                        Products found
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                        @foreach ($products as $product)
                            <div class="row">
                                {{-- Start foreach product --}}
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('product/'.$product->image) }}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="/product_detail/{{ $product->id }}"><i class="fa fa-info"></i></a></li>
                                                <form action="{{ route('add_to_cart', ['id' => $product->id]) }}">
                                                    <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                                    <input type="number" value="1" name="quantity">
                                                </form>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $product->name }}</a></h6>
                                            <h5>${{ $product->price }}</h5>
                                        </div>
                                    </div>
                                </div>
                                {{-- End foreach product --}}
                            </div>
                        @endforeach
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
