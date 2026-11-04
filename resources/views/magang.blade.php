@extends('layouts.app')

@section('title', 'Siswa Magang')

@section('content')

    <h2>Rekap Nilai Siswa PKL</h2>

    <div class="row g-3">

        @foreach($peserta as $data)

            <div class="col-md-4 ">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{$data['nama']}}
                        </h4>

                        <h5 class="card-text">
                            Jurusan: {{$data['jurusan']}}
                        </h5>

                        <h5 class="card-text">
                            Sekolah: {{$data['sekolah']}}
                        </h5>

                        <p class="card-text">
                            Nilai: {{$data['nilai']}}
                        </p>

                        @if($data['nilai'] >= 75)
                            <p class="text-success fw-bold">
                                Siswa Dinyatakan Lulus
                            </p>
                        @else
                            <p class="text-danger fw-bold">
                                Siswa Dinyatakan Tidak Lulus
                            </p>
                        @endif

                        <div class="p-1">
                            <x-button text="Lihat Detail"/>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection