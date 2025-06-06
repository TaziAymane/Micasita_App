<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginfORM()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $user = User::create([
            "nomComplait" => $request->nomComplait,
            "tele" => $request->tele,
            "adress" => $request->adress,
            "password" => $request->password
        ]);
        Auth::login($user);
        // dd(Auth::attempt($values)) ;
        return redirect()->route('homePage')->with('success', 'Login success');
    }

    public function login(Request $request)
    {
        $nomComplait = $request->nomComplait;
        $tele = $request->tele;
        $password = $request->password;
        $values = ["nomComplait" => $nomComplait, "tele" => $tele, 'password' => $password];


        if (Auth::attempt($values)) {
            $request->session()->regenerate();
            return redirect()->route('homePage')->with('success', 'Login success');
        } else {
            return back()->withErrors([
                'nomComplait' => "invalide nom ",
                'tele' => "invalide telephone numbre ",
            ])->onlyInput('nomComplait', 'tele');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        return redirect()->route('homePage')->with('success', 'You have been logged out.');
    }

    
}
