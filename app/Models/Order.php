<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static function add_order(Request $request){
        $cart = session('cart');
        $total_price = 0;
        $total_quantity = 0;

        foreach ($cart as $ct => $val) {
            $price = $val['price'] * $val['quantity'];
            $total_price += $price;
            $total_quantity += $val['quantity'];
        }
        $data = Order::create([
            'order_date' => date('Y-m-d'),
            'total_price' => $total_price,
            'quantity' => $total_quantity,
            'table_id' => $request->table_id,
            'payment_id' => $request->payment_id,
        ]);
        // dd($data);

        return $data->order_id;
    }
}
