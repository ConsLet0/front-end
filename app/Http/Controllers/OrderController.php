<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Order;
use App\Models\Table;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

        return redirect()->back()->with('successadd', 'Yess berhasil tambah ke keranjang !');
    }

    public function view_cart(){
        $cart = session('cart');
        $payment_method = PaymentMethod::orderBy('id', 'asc')->get();
        $table = Table::orderBy('id', 'asc')->get();
        // $table = Table::orderBy('no_table', 'asc')->get();
        return view('userpage.page.cart', compact('payment_method', 'table'))->with('cart', $cart);
    }

    public function remove_cart($product_id){
        $cart = session('cart');
        unset($cart[$product_id]);
        session(['cart' => $cart]);

        return redirect()->back()->with('successdelete', 'Produk Berhasil Dihapus');
    }

    public function checkout(Request $request){
        $rules = [
            'name' => 'required',
            'payment_method_id' => 'required',
            'table_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->with('errorcheckout', 'Pastikan Semua Data Terisi !');
        }
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

        return redirect('/status')->with('successcheckout', 'Checkout Berhasil, Silahkan Tunggu Pesanan Kamu Datang');
    }

    public function show_ordered(){
        $order = Order::latest()->first();
        return view('userpage.page.status', compact('order'));
    }

    public function download_bill($id){
        $bill = Order::find($id);
        $detail = OrderDetail::where('order_id', $id)->get();
        $pdf = PDF::loadview('adminpage.page.bill', compact('bill', 'detail'))->setPaper('letter', 'potrait');

        return $pdf->download('struk_pembayaran_starsbug.pdf');
    }
}