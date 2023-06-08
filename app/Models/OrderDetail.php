<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public static function add_order_detail($product_id, $order_id){
        OrderDetail::create([
            'product_id' => $product_id,
            'order_id' => $order_id,
        ]);
    }
}
