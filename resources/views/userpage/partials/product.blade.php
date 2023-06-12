    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <form action="{{ route('add_to_cart', ['id' => $prd->id]) }}">
            <div class="product__item__pic set-bg" data-setbg="{{ asset('product/'.$prd->image) }}">
                <ul class="product__item__pic__hover">
                    <li>
                        <button type="submit">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </li>
                    <li><a href="/detail/{{ $prd->id }}"><i class="fa fa-info"></i></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <span>Dried Fruit</span>
                <h5>{{ $prd->name }}</h5>
                <div class="product__item__price">${{ $prd->price }} 
                    <td class="shoping__cart__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input name="quantity" type="number" value="1">
                            </div>
                        </div>
                    </td>
                </div>
            </div>
            </form>
        </div>
    </div>