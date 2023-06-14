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
@section('upper-content')
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="hero__item set-bg" data-setbg="{{ asset('userpage/img/hero/banner.jpg') }} ">
                        <div class="hero__text">
                            <span class="text-light">FRESH COFFEE</span>
                            <h2 class="text-light">COFFEE <br />100% Organic</h2>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('userpage/img/banner/banner-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('userpage/img/banner/banner-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Start foreach gallery --}}
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('userpage/img/blog/blog-1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('userpage/img/blog/blog-2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('userpage/img/blog/blog-3.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                {{-- End foreach gallery --}}
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
