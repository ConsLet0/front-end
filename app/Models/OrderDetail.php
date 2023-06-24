<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'order_id', 'quantity', 'price', 'sub_total'
    ];

    public static function add_order_detail($product_id, $order_id, $quantity, $price, $sub_total){
        OrderDetail::create([
            'product_id' => $product_id,
            'quantity' => $quantity,
            'price' => $price,
            'sub_total' => $sub_total,
            'order_id' => $order_id,
        ]);

    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
