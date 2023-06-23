<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard(){
        $total_produk_terjual = DB::table('orders')->sum('quantity');
        $total_pendapatan = DB::table('orders')->sum('total_price');
        $total_pelanggan = DB::table('orders')->count();
        $laporan_penjualan = Order::orderBy('created_at', 'asc')->get();

        return view('adminpage.page.homepage', compact('total_produk_terjual', 'total_pendapatan', 'total_pelanggan', 'laporan_penjualan'));
    }
    
    public function order(){
        $orders = Order::orderBy('created_at', 'asc')->get();
        $new_order = Order::where('created_at', '>=', Carbon::now()->subDay())->get();

        return view('adminpage.page.order', compact('orders', 'new_order'));
    }

    public function order_detail($id){
        $order = Order::find($id);
        $order_detail = OrderDetail::where('order_id', $id)->get();

        return view('adminpage.page.detailorder', compact('order', 'order_detail'));
    }

    public function finish_order(Request $request){
        $rules = [
            'order_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $finish_order = Order::where('id', $request->order_id)->first();
        $finish_order->status = 1;
        $finish_order->update();

        return back()->with('message', 'Order Finished!');
    }

    public function cancel_order(Request $request){
        $rules = [
            'order_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $cancel_order = Order::where('id', $request->order_id)->first();
        $cancel_order->status = 2;
        $cancel_order->update();

        return back()->with('message', 'Order Canceled!');
    }
}
