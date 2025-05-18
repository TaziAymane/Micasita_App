<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countProfiles = Profile::count();
        $countProduct = Product::count() ;
        $countMenu = Menu::count() ;
        return view('components.Admin.Statistice',compact('countProfiles','countProduct','countMenu'));
    }

    // statistice 
    public function statistice(){
        $countProfiles = Profile::count();
        return view('components.Admin.Statistice',compact('countProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
