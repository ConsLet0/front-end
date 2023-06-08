<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $table = Table::orderBy('no_table', 'asc')->get();
        $payment = Payment::orderBy('name', 'asc')->get();

        return view('cart_test', compact('table', 'payment'))->with('cart', $cart);
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

        return view('ordered', compact('order_id', 'my_order_detail'));
    }
}
