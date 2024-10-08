<?php

namespace App\Http\Controllers;

use Session;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function home(){
        $products = Product::paginate(8);
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }
        else{
            $count = '';
        }
        return view('home.index', compact('products', 'count'));
    }

    public function dashboard (){
        $products = Product::paginate(8);
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }
        else{
            $count = '';
        }
        return view('home.index', compact('products', 'count'));
    }



    public function product_details($id){
        $product = Product::find($id);
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }
        else{
            $count = '';
        }
        return view('home.product_details', compact('product', 'count'));
    }

    public function add_to_cart($id){
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;

        if ($cart->save()) {
            toastr()->closeButton()->timeOut(5000)->success('Product Add on Cart successfully!');
            return redirect()->back();
        } else {
            toastr()->closeButton()->timeOut(5000)->warning('Field to Add Product on Cart. try again later!');
            return redirect()->back();
        }

    }

    public function my_cart(){
        if (Auth::user()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();

            $carts = Cart::where('user_id', $user_id)->get();
        }

        return view('home.my_cart', compact('count', 'carts'));
    }

    public function cart_item_delete($id){
        $selected_cart = Cart::find($id);

        if ($selected_cart->delete()) {
            toastr()->closeButton()->timeOut(5000)->warning('Cart item Delete successfully!');
            return redirect()->back();
        } else {
            toastr()->closeButton()->timeOut(5000)->success('Field to Delete Cart item. try again later!');
            return redirect()->back();
        }
    }

    public function add_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            $order = new Order;
            $order->name = $name;
            $order->address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $cart->product_id;

            $order->save();
        }
        $cart_reamove = Cart::where('user_id', $user_id)->get();

        foreach ($cart_reamove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->closeButton()->timeOut(5000)->success('Order Placed successfully!');
        return redirect(route('home.my_cart'));

    }

    public function my_order(){
        $user_id = Auth::user()->id;
        $count = Cart::where('user_id', $user_id)->count();
        $orders = Order::where('user_id', $user_id)->get();
        return view('home.my_order', compact('count', 'orders'));
    }


    public function stripe($value)
    {
        return view('home.stripe', compact('value'));
    }

    public function stripePost(Request $request, $value)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            $order = new Order;
            $order->name = $name;
            $order->address = $address;
            $order->phone = $phone;
            $order->payment_status = "paid";
            $order->user_id = $user_id;
            $order->product_id = $cart->product_id;

            $order->save();
        }
        $cart_remove = Cart::where('user_id', $user_id)->get();

        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->closeButton()->timeOut(5000)->success('Card Payment successfully!');
        return redirect(route('home.my_cart'));
    }

    public function shop(){
        $products = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }
        else{
            $count = '';
        }
        return view('home.shop', compact('products', 'count'));
    }

    public function why(){
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }
        else{
            $count = '';
        }
        return view('home.why', compact('count'));
    }


    public function testimonial(){
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }
        else{
            $count = '';
        }
        return view('home.testimonial', compact('count'));
    }

    public function contact(){
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }
        else{
            $count = '';
        }
        return view('home.contact', compact('count'));
    }
}
