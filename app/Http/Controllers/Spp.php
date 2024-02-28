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

    public function delete(SppModel $id){
        $id->delete();
        return redirect('/pembayaran')->with(['dataDelete' => true]);
    }

    public function edit($id){
        $data = [
            'title' => 'Edit Data SPP',
            'pembayaran' => SppModel::find($id)
        ];
        
        return view('pembayaran.edit', $data);
    }

    public function update(Request $request, $id){
        $pembayaran = SppModel::find($id);
        $pembayaran->update($request->except(['_token', '_method']));

        return redirect('/pembayaran')->with(['dataEdit' => true]);
    }
}
