<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'username' => 'required|min:5|max:20',
            'phone' => 'required|min:10|max:14',
            'adress' => 'nullable'
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
    public function settings(){
       $user = Auth::user();
      $profile = Profile::where('id', $user->id)->firstOrFail();
        // dd($profile);
        return view('components.Settings',compact('profile','user'));
    }
}
