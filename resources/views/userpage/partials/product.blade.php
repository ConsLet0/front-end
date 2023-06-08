<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="{{ asset('product/'.$prd->image) }}">
            <ul class="product__item__pic__hover">
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                <li><a href="/deatils"><i class="fa fa-info"></i></a></li>
            </ul>
        </div>
        <div class="product__item__text">
            <span>Dried Fruit</span>
            <h5>{{ $prd->name }}</h5>
            <div class="product__item__price">${{ $prd->price }} 
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <div class="pro-qty">
                            <input type="text" value="1">
                        </div>
                    </div>
                </td>
            </div>
        </div>
    </div>
</div>
