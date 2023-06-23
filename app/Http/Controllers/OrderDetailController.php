<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderDetailController extends Controller
{
    // public function order_detail($id){
    //     $order_detail = OrderDetail::where('order_id', $id)->orderBy('created_at', 'asc')->get();
    //     // $order = Order::find($id);
    //     // $order_detail = OrderDetail::where('order_id', $order->id)->orderBy('created_at', 'desc')->get();
    //     // dd($order_detail);
    //     // $product = Product::all();

    //     return view('userpage.page.orderdetail', compact('order_detail'));
    // }
}
