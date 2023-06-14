<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function add_to_cart(Request $request, $product_id){
        $cart = session('cart');
        $product = Product::get_product($product_id);
        $cart[$product_id] = [
            'name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'image' => $product->image,
        ];
        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function view_cart(){
        $cart = session('cart');
        // $table = Table::orderBy('no_table', 'asc')->get();

        return view('userpage.page.cart')->with('cart', $cart);
    }

    public function remove_cart($product_id){
        $cart = session('cart');
        unset($cart[$product_id]);
        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function checkout(Request $request){
        // dd($request);
        $cart = session('cart');
        $order_id = Order::add_order($request);
        foreach ($cart as $ct => $val) {
            $product_id = $ct;
            $quantity = $val['quantity'];
            OrderDetail::add_order_detail($product_id, $order_id, $quantity);
        }
        session()->forget('cart');
        // dd($order_id);
        $my_order_detail = OrderDetail::where('order_id', $order_id)->get();

        return redirect()->back()->with('success', 'Checkout Success!');
    }

    public function show_ordered(){
        $order = Order::latest()->first();

        return view('userpage.page.status', compact('order'));
    }
}
