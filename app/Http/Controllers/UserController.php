<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        // $countUsers = User::count();
        $users = User::latest()->paginate(15);
        return view('components.Admin.Users.index',compact('users'));
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('components.Admin.Users.show',compact('user'));
    }



    public function edit($id){
        $user = User::findOrFail($id);
        return view('components.Admin.Users.edit',compact('user'));
    }

    public function update(Request $request,$id){
        $user = User::findOrFail($id);
        $validData = $request->validate([
            'nomComplait' => 'required|min:5|max:20',
            'tele' => 'required|min:10|max:14',
            'adress' => 'nullable'
        ]);

        $user->update($validData) ;
        return redirect()->route('user.show',$id)->with('success','User updated with success');
    }

    public function destroy(Request $request){
        $id = $request->id ;
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','User deleted with success');
    }
    
    public function settings(){
        $user = Auth::user();
        $userdata = User::where('id',$user->id)->firstOrFail() ;
        // dd($userdata);
        return view('auth.Settings',compact('userdata'));
    }
}
