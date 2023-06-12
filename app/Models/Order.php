<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_date', 'total_price', 'quantity'
    ];

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
            // 'table_id' => $request->table_id,
        ]);
        // dd($data);

        return $data->order_id;
    }
}
