<?php

namespace App\Http\Controllers;

use App\Models\SppModel;
use Illuminate\Http\Request;

class Spp extends Controller
{
    public function index(){
        $data = [
            'title' => 'Spp',
            'pembayaran' => SppModel::all()
        ];
        return view('pembayaran.index', $data);
    }

    public function save(Request $request){
        SppModel::create($request->except(['_token', 'simpan']));
        return redirect('/pembayaran')->with(['dataTambah' => true]);
    }
}
