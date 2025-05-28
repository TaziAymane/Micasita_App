<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('components.Admin.Profiles.login');
    }
    public function login(Request $request)
    {
        $username = $request->username;
        // $adress = $request->adress ;
        $password = $request->password;
        $values = ['username' => $username, 'password' => $password];
        if (Auth::attempt($values)) {
            $request->session()->regenerate();
            return redirect()->route('homePage')
                ->with('success', ' Welkom Back to Micasita ' . $request->username);
        } else {
            return back()->withErrors(
                [
                    'username' => 'username or password wrong '
                ]
            );
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('homePage')->with('success','logout with siccess') ;
    }
    public function register()
    {
        return view('components.Admin.Profiles.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'username' => 'required|min:5|max:20',
            'phone' => 'required|min:10|max:13',
            'adress' => 'nullable',
            'password' => 'required|min:8'
        ]);


        Profile::create([
            'username' => $request->username,
            'phone' => $request->phone,
            'adress' => $request->adress ,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('homePage')
            ->with('success', $request->name . ' Welkom to Micasita ');
    }
}
