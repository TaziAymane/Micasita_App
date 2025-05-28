<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function HomePage()
    {
        $menus = Menu::all();
        return view('components.HomePage',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ProductPage(Request $request ,$categorie)
    {

        // dd($request->categorie);
        $products = Product::where('categorie',$categorie)->get();
        $categories_name = Menu::where('categorie_name',$categorie)->get();
        $categories = Menu::all();
        return view('components.ProductPage',compact('products','categories','categories_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
