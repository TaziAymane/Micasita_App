<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(15);
        return view('components.Admin.Menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.Admin.Menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie_name'   =>   'required',
            'time_take'        =>   'required',
            'image'            =>   'required|image|mimes:png,jpg,jpeg,svg|max:10240'
        ]);

        $categorie_name = $request->categorie_name;
        $time_take = $request->time_take;
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        // dd($request->image) ;
        
        
        // dd($imagePath);
        Menu::create([
            'categorie_name'  =>  $categorie_name,
            'time_take'   => $time_take,
            'image'  => $imagePath
        ]);

        return redirect()->route('menu.index')->with('success', 'categorie add with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       $id = $request->id ;
       $item = Menu::findOrFail($id);
       return view('components.Admin.Menu.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id ;
        $item = Menu::findOrFail($id) ;
        return view('components.Admin.Menu.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $itemUpdate = Menu::findOrFail($id);
        $validatData = $request->validate([
            'categorie_name'   =>   'required',
            'time_take'        =>   'required',
            'image'            =>   'required|image|mimes:png,jpg,jpeg,svg|max:10240'
        ]);
        if($request->hasFile('image')){
            if($itemUpdate->image){
                Storage::disk('public')->delete($itemUpdate->image);
            }
            $validatData['image'] = $request->file('image')->store('images','public');
        }else{
            $validatData['image'] = $itemUpdate->image ;
        }
        $itemUpdate->update($validatData);
        return redirect()->route('menu.index')->with('success','update with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Menu::findOrFail($id);
        $item->delete() ;
        return redirect()->route('menu.index')
                   ->with('success', 'item deleted successfully');
    }

// Called when user submits the form (search logic and redirect)
public function handleSearch(Request $request)
{
    $query = $request->input('q');

    return redirect()->route('product_categorie', ['category' => $query]);
}

// Called when redirected to the route with category in URL
public function showByCategory($category)
{
    $menus = Menu::where('categorie_name', 'like', '%' . $category . '%')->get();

    return view('product-category', compact('menus', 'category'));
}
}
