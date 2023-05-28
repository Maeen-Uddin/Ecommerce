<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;


class DashboardController extends Controller
{
    // public function redirect(){
    //     $usertype=Auth::User()->usertype;
    //     if($usertype=='0')
    //     {
    //        return view('frontend.dashboard.index');
    //     }else{
    //        return view('/');
    //     }
    //    }

    public function index()
    {
        $product = Product::paginate(6);
        return view('frontend.cart.show_cart', compact('product'));
    }
    public function show_cart()
    {
        return view('frontend.cart.show_cart');
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('frontend.cart.product_details', compact('product'));
    }
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;

            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function show_carts()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('frontend.cart.show_carts', compact('cart'));
        } else {
            return redirect('login');
        }
    }
    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', '=', $userid)->get();

        foreach ($data as $data) {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;


            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message', 'We have Received your Order. We will Connect With You Soon.');
    }
    public function stripe($totalprice)
    {

        return view('frontend.cart.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Pay Using Your Card"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
    public function show_order()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $order = Order::where('user_id', '=', $userid)->get();
            return view('frontend.cart.order', compact('order'));
        } else {
            return redirect('login');
        }
    }
    public function cancel_order($id)
    {
        $order = Order::findOrfail($id);
        $order->delivery_status = ' You Canceled the order';
        $order->save();
        return redirect()->back();
    }
}
