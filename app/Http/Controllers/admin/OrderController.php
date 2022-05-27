<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return view('admin.order.index', [
            'order' => Order::where('status', '0')->get()
        ]);
    }

    public function view($id) {
        return view('admin.order.view', [
            'order' => Order::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id) {
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->update();
        return redirect('order')->with('status', "Order Has Been update");
    }

    public function History(){
        $order = Order::where('status', '1')->get();
        return view('admin.order.history', compact('order'));
    }
}
