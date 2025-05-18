<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $profiles = Profile::latest()->paginate(15);
        return view('components.Admin.profiles.index',compact('profiles'));
    }

    public function show($id){
        $profile = Profile::findOrFail($id);
        return view('components.Admin.Profiles.show',compact('profile'));
    }

    public function create(){
        return view('components.Admin.Profiles.login');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:5|max:20',
            'phone' => 'required|min:10|max:13'
        ]);

        $name = $request->name ;
        $phone = $request->phone ;

        Profile::create([
            'name' => $name ,
            'phone' => $phone
        ]);

        return redirect()->route('homePage')
        ->with('success',$name.' Welkom to Micasita ');
    }

    public function edit($id){
        $profile = Profile::findOrFail($id);
        return view('components.Admin.Profiles.edit',compact('profile'));
    }

    public function update(Request $request,$id){
        $profile = Profile::findOrFail($id);
        $validData = $request->validate([
            'name' => 'required|min:5|max:20',
            'phone' => 'required|min:10|max:12'
        ]);

        $profile->update($validData) ;
        return redirect()->route('profile.show',$id)->with('success','profile updated with success');
    }

    public function destroy(Request $request){
        $id = $request->id ;
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return redirect()->route('profile.index')->with('success','profile deleted with success');
    }
}
