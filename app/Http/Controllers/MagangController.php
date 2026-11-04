<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MagangController extends Controller
{
    public function Magang() {
        $peserta = [
        [
            'nama' => 'Ahn Keonho',
            'jurusan' => 'TKJ',
            'sekolah' => 'SMK Muhammadiyah 6 Rogojampi',
            'nilai' => '74'
        ],
        [
            'nama' => 'Zhao Yufan',
            'jurusan' => 'TP',
            'sekolah' => 'SMK Muhammadiyah 6 Rogojampi',
            'nilai' => '89'
        ],
        [
            'nama' => 'Martin Edwards',
            'jurusan' => 'RPL',
            'sekolah' => 'SMK Muhammadiyah 6 Rogoojampi',
            'nilai' => '85'
        ],
        [
            'nama' => 'Eom Seonghyeon',
            'jurusan' => 'LK',
            'sekolah' => 'SMK Muhammadiyah 6 Rogojampi',
            'nilai' => '77'
        ],
        [
            'nama' => 'Kim Juhoon',
            'jurusan' => 'TBSM',
            'sekolah' => 'SMK Muhammadiyah 6 Rogojampi',
            'nilai' => '91'
        ]
        ];

        return view('magang', compact('peserta'));
    }
}
