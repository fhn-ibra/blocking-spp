<?php

namespace App\Http\Controllers;

use App\Models\SppModel;
use Illuminate\Http\Request;

class Siswa extends Controller
{
    public function index(){
        $data = [
            'title' => 'Spp',
            'pembayaran' => SppModel::all()
        ];
        return view('siswa.index', $data);
    }
}
