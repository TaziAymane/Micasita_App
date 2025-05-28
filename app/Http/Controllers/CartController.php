<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']  = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name'  =>  $product->product_name,
                'quantity'  => 1,
                'price'  => $product->price,
                'image'  => $product->image,
                'categorie'  => $product->categorie
            ];
        }


        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to the cart');
    }

    public function cart(){
        return view('components.Admin.product.cart');
    }

    public function cartUpdate(Request $request){
        info($request->all());
    }
}
