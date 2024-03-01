<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Admin extends Controller
{   

    public function index(){
        return view('akun.index', ['akun' => User::all(),
    'title' => 'Akun']);
    }

    public function update(Request $request, User $id){
        $akun = $id;
        if($request->password == null){
            $akun->username = $request->username;
            $akun->nama = $request->nama;
            $akun->level = $request->level;
            $akun->save();

            return redirect('akun')->with(['dataEdit' => true]);
        } else {
            $akun->username = $request->username;
            $akun->nama = $request->nama;
            $akun->level = $request->level;
            $akun->password = $request->password;
            $akun->save();
            
            return redirect('akun')->with(['dataEdit' => true]);
        }
    } 
}
