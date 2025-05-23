<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        // $countProfiles = Profile::count();
        $profiles = Profile::latest()->paginate(15);
        return view('components.Admin.profiles.index',compact('profiles'));
    }

    public function show($id){
        $profile = Profile::findOrFail($id);
        return view('components.Admin.Profiles.show',compact('profile'));
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
