<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index() 
    {
        $siswa = Siswa::all();

        return view('siswa.index', compact('siswa'));
    }

    public function dataSiswa()
    {
        $siswa = Siswa::all();

        return response()->json($siswa);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required'
        ], [
            'nama.required' => 'Nama siswa wajib diisi!',
            'kelas.required' => 'Kelas wajib diisi!'
        ]);

        $siswa = Siswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        return response()->json([
            'message' => 'Data siswa berhasil ditambahkan',
            'data' => $siswa
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required'
        ], [
            'nama.required' => 'Nama siswa wajib diisi!',
            'kelas.required' => 'Kelas wajib diisi!'
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        return response()->json([
            'message' => 'Data siswa berhasil diperbarui!'
        ]);
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
