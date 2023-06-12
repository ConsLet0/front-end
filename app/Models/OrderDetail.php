<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'order_id'
    ];

    public static function add_order_detail($product_id, $order_id){
        OrderDetail::create([
            'product_id' => $product_id,
            'order_id' => $order_id,
        ]);
    }
}
