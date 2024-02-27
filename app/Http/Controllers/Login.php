<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function index(){
        return view('login');
    }

    public function proses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            if(Auth::user()->level == 'admin'){
                return redirect()->intended('admin');
            } elseif(Auth::user()->level == 'siswa'){
                return redirect()->intended('siswa');
            }
        }
        return back()->withErrors(['gagal' => true]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
