<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('frontend.order.index',[
            'order' => Order::where('user_id', Auth::id())->get()
        ]);
    }

    public function view($id) {
        return view('frontend.order.view', [
            'order' => Order::where('id', $id)->where('user_id', Auth::id())->first()
        ]);

    }
}
