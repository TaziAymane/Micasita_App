<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        return view('components.cart');
    }

    public function placeOrder(Request $request)
    {
        $data = $request->validate([
            'cart' => 'required|array',
            'notes' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        $profileId = Auth::id(); // assuming you're using `Auth::guard('web')->user()`
        if (!$profileId) return response()->json(['error' => 'Unauthenticated'], 401);

        $total = 0;
        foreach ($data['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'profile_id' => $profileId,
            'notes' => $data['notes'] ?? '',
            'payment_method' => $data['payment_method'],
            'total' => $total,
        ]);

        foreach ($data['cart'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return response()->json(['message' => 'Order placed successfully']);
    }
    public function Order(){
        $oreders = Order::all() ;
        return view('components.Admin.Orders.index',compact('oreders')) ;
    }
}
