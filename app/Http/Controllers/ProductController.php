<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('components.Admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.Admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'product_name' => 'required|min:3',
            'price'   => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:10240'
        ]);
        $productName = $request->product_name ;
        $price = $request->price ;
        $imagePath = null ;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('product','public');
        };

        Product::create([
            'product_name' => $productName ,
            'price'  => $price ,
            'image'  => $imagePath
        ]);

        return redirect()->route('product.index')->with('success','product created with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id ;
        $item = Product::findOrFail($id);
        return view('components.Admin.product.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);
        return view('components.Admin.product.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $itemUpdate = Product::findOrFail($id);
        $validateDate = $request->validate([
            'product_name' => 'required|min:3',
            'price'   => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:10240'
        ]);
          if($request->hasFile('image')){
            if($itemUpdate->image){
                Storage::disk('public')->delete($itemUpdate->image);
            }
            $validateDate['image'] = $request->file('image')->store('images','public');
          }else{
            $validateDate['image'] = $itemUpdate->image ;
          }
        $itemUpdate->update($validateDate);
        return redirect()->route('product.index')->with('success','item updated with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::findOrFail($id);
        $item->delete();
        return redirect()->route('product.index')->with('success','item deleted with success');
    }
}
