<form action="/edit_menu_category" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" id="name" value="{{$menu_category->name}}">
    <select name="product_category" id="product_category">
        @foreach($product_category as $pct)
            <option value="{{$pct->id}}">{{$pct->name}}</option>
        @endforeach
    </select>
    <button type="submit" value="submit" class="submit-btn">
        Update
    </button>
</form>