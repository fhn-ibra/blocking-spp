<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
                return redirect('/pembayaran');
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

    public function akunku(Request $request){
        // dd($request->all());
        $akun = User::find(Auth::user()->id);

        if($request->password == null){
           $akun->nama = $request->nama; 
           $akun->username = $request->username; 
           $akun->save();
           return back()->with(['dataAkun' => true]); 
        } else {
            $akun->nama = $request->nama; 
           $akun->username = $request->username; 
           $akun->password = $request->password; 
           $akun->save();
           return back()->with(['dataAkun' => true]);
        }
    }
}
