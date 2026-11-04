<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function kotaSekolah(){
        $namaSekolah = 'SMUHERO';
        $kota = 'Banyuwangi';

        return view('sekolah', compact('namaSekolah', 'kota'));
    }
}
