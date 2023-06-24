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
            @if(session('successadd'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ session('successadd') }}
                </div>
            @endif
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
                    <div class="row">
                        @include('userpage.partials.product')
                    </div>
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
