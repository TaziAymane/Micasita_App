<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cart()
    {
        if (Auth::check()) {
            $data = DB::table('carts')->where('user_id','=',Auth::user()->id)
            ->join('products','carts.product_id','products.id')
            ->select('products.*','carts.quantity')
            ->latest()->paginate(10) ;
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
            $data = DB::table('carts')->where('user_id','=',$ip)
            ->join('products','carts.product_id','products.id')
            ->select('products.*','carts.quantity')
            ->latest()->paginate(10) ;
        }
        return view('components.cart.cart',compact('data'));
    }


    public function addToCart(Request $request){
        if ($request->isMethod('post')) {

            $quantity = $request->quantity ;
            $productId = $request->productID ;
            if(Auth::check()){
                $cart = Cart::insert([
                'user_id' =>Auth::user()->id,
                'product_id' => $productId ,
                'quantity' => $quantity,
            ]);
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
                 $cart = Cart::insert([
                'user_ip' => $ip,
                'product_id' => $productId ,
                'quantity' => $quantity,
            ]);
            }
            

            return response()->json(['data' => 1]) ;
        }else{
            return redirect()->route('homePage') ;
        }
    }

    public function destroy($id){

        $data = Cart::where('product_id' , '=' , $id)->delete() ;
       return response()->json(['data' => $data]) ;    

      
    }

    public function placeOrder(Request $request)
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'You need to be logged in to place an order.');
    }

    $cartItems = Cart::where('user_id', $user->id)->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Cart is empty.');
    }

    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item->product->price * $item->quantity;
    }

    $order = Order::create([
        'user_id' => $user->id,
        'total_price' => $total,
        'payment_method' => $request->input('payment_method', 'card'),
    ]);

    foreach ($cartItems as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
        ]);
    }

    Cart::where('user_id', $user->id)->delete();

    return redirect()->route('homePage')->with('success', 'Order placed successfully!');
}


    
}
 