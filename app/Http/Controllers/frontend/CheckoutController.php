<?php

namespace App\Http\Controllers\frontend;



use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use phpDocumentor\Reflection\Types\Null_;

class CheckoutController extends Controller
{
    public function index(Request $request) {

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-gfERv5apdVZm2FFDEmj5Ivqq';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
 
$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 10000,
    ),
    'customer_details' => array(
        'first_name' => $request->get('fname'),
        'last_name' => $request->get('lname'),
        'email' => 'budi.pra@example.com',
        'phone' => '08111222333',
    ),
);
 
$snapToken = \Midtrans\Snap::getSnapToken($params);
     
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if(!Product::where('id', $item->prod_id)->where('qty', ' >= ', $item->prod_qty)->exists());
            // {
            //     $remove = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
            //     $remove->delete();
            // }
        }
    
       $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', [
          'cartItem' => $cartitems,
          'snapToken' => $snapToken
         
        ]);
    }

    public function PlaceOrder(Request $request) {
        $order = new Order();
        $order-> user_id = Auth::id();
        $order -> fname = $request->input('fname');
        $order -> lname = $request->input('lname');
        $order -> email = $request->input('email');
        $order -> phone = $request->input('phone');
        $order -> address1 = $request->input('address1');
        $order -> address2 = $request->input('address2');
        $order -> city = $request->input('city');
        $order -> state = $request->input('state');
        $order -> county = $request->input('county');
        $order -> pincode = $request->input('pincode');

        $order -> payment_mode = $request->input('payment_mode');
        $order -> payment_id = $request->input('payment_id');
        
        //to calculate the total price
        $total = 0;
        $cartItem_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartItem_total as $prod)
        {
            $total += $prod->product->selling_price;
        }

        $order->total_price = $total;
        $order->tracking_no = 'Deni'.rand(1111,9999);
        $order->save();
        
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->product->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address1 == null)
        {
            $user = User::where('id', Auth::id())->first();
            $user -> name = $request->input('fname');
            $user -> lname = $request->input('lname');
            $user -> email = $request->input('email');
            $user -> phone = $request->input('phone');
            $user -> address1 = $request->input('address1');
            $user -> address2 = $request->input('address2');
            $user -> city = $request->input('city');
            $user -> state = $request->input('state');
            $user -> county = $request->input('county');
            $user -> pincode = $request->input('pincode');   
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

       if($request->input('payment_mode') == 'Paid by Midtrans')
       {
        return redirect()->json('status', "Order Has Benn Success");
       }

        return redirect('/')->with('status', "Order Has Benn Success");
    }

    public function pay(Request $request)
    {        
            
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item)
        {
            $total_price += $item->product->selling_price * $item->prod_qty;
        }
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city  = $request->input('city');
        $state = $request->input('state');
        $county = $request->input('county');
        $pincode = $request->input('pincode');

        return response()->json([
            "firstname"=> $firstname,
            "lastname"=> $lastname,
            "email"=> $email,
            "phone"=> $phone,
            "address1"=> $address1,
            "address2"=> $address2,
            "city"=> $city,
            "state"=> $state,
            "county"=> $county,
            "pincode"=> $pincode,
            "total_price" => $total_price, 
           
            
        ]);
    }
}
