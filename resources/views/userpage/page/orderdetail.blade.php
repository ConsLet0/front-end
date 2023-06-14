{{-- @dd($order_detail) --}}
@foreach ($order_detail as $od)
@dd($od->product_id->product->name)
    {{ $od->order_detail_id }}
    {{-- {{ $od->product->name }} --}}
@endforeach