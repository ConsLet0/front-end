<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Table;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date', 'name', 'total_price', 'quantity', 'status', 'payment_method_id', 'table_id'
    ];

    public function order_detail(){
        return $this->hasMany(OrderDetail::class);
    }

    public function payment_method(){
        return $this->hasMany(OrderDetail::class);
    }

    public function table(){
        return $this->belongsTo(Table::class);
    }

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
            'name' => $request->name,
            'total_price' => $total_price,
            'quantity' => $total_quantity,
            'status' => 0,
            'payment_method_id' => $request->payment_method_id,
            'table_id' => $request->table_id,
        ]);
        // dd($data);

        return $data->id;
    }
}
