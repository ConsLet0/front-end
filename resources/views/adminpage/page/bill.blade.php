{{ $bill->order_id }}
{{ $bill->created_at }}
{{ $bill->name }}
{{ $bill->quantity }}
{{ $bill->total_price }}
@if ($bill->payment_method_id == 1)
    Cash
@elseif ($bill->payment_method_id == 2)
    Debit
@endif

{{-- @dd($detail) --}}
@foreach ($detail as $item)
{{-- @dd($item->product->name) --}}
    {{ $item->product->name }}
@endforeach