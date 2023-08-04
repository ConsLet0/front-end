@foreach ($products as $product)
    {{-- Start foreach product --}}
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="{{ asset('product/' . $product->image) }}">
                <ul class="product__item__pic__hover">
                    <li>
                        <a href="/product_detail/{{ $product->id }}"><i class="fa fa-info"></i></a>
                    </li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6><a href="/product_detail/{{ $product->id }}">{{ $product->name }}</a></h6>
                <h5>${{ $product->price }}</h5>
                <form class="mt-2" action="{{ route('add_to_cart', ['id' => $product->id]) }}">
                    @if ($product->status == 1)
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" value="1" name="quantity">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-bag"></i></button>
                    @elseif ($product->status == 2)
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <button type="button" class="btn btn-secondary" disabled>Habis</button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    {{-- End foreach product --}}
@endforeach
