<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="header__logo">
        <a href="/"><img src="{{ asset('userpage/img/logo.png') }}" alt=""></a>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <?php
        $category = DB::table('product_categories')
            ->orderBy('name', 'desc')
            ->get();
        ?>
        <ul>
            <li><a href="/">Home</a></li>
            {{-- @dd($category) --}}
            @foreach ($category as $ct)
                <li><a href="/category/{{ $ct->id }}">{{ $ct->name }}</a></li>
            @endforeach
            <li><a href="/contact">Contact</a></li>
            <li><a href="/status">Status</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
</div>
<!-- Humberger End -->
<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/"><img src="{{ asset('userpage/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <?php
                    $category = DB::table('product_categories')
                        ->orderBy('name', 'desc')
                        ->get();
                    ?>
                    <ul>
                        <li><a href="/">Home</a></li>
                        {{-- @dd($category) --}}
                        @foreach ($category as $ct)
                            <li><a href="/category/{{ $ct->id }}">{{ $ct->name }}</a></li>
                        @endforeach
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/status">Status</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="/cart"><i class="fa fa-shopping-bag"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
