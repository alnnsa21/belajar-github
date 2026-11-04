@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="rounded-xl bg-blue-500 p-6 m-4 text-white">
        <h2 class="text-2xl font-bold text-center">
            Rekap Nilai Siswa PKL
        </h2>
    </div>

    <div class="row g-3">

        <div class="col-md-4">
            <div class="card p-3">
                <h4>Ahn Keonho</h4>
                <h5 class="mt-3">Jurusan TKJ</h5>
                <p>Nilai: 74</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h4>Zhao Yufan</h4>
                <h5 class="mt-3">Jurusan TP</h5>
                <p>Nilai: 89</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h4>Martin Edwards</h4>
                <h5 class="mt-3">Jurusan RPL</h5>
                <p>Nilai: 85</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h4>Eom Seonghyeon</h4>
                <h5 class="mt-3">Jurusan LK</h5>
                <p>Nilai: 77</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h4>Kim Juhoon</h4>
                <h5 class="mt-3">Jurusan TBSM</h5>
                <p>Nilai: 91</p>
            </div>
        </div>

    </div>

    <div class="m-4">
        <x-button text="Simpan" />
        <x-button text="Hapus" />
    </div>


</div>

@endsection