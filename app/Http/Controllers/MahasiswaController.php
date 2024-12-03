<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::all(); // Ambil semua data mahasiswa
        return view('master-data.mahasiswa.index', compact('mahasiswas'));
    }
    public function create()
    {

        return view('master-data.mahasiswa.create-mhs');
    }

    public function store(Request $request)
    {

        // Validasi input
        $validated =
            $request->validate([
                'npm' => 'required|unique:mahasiswas|max:15',
                'nama' => 'required|max:255',
                'prodi' => 'required|max:100',
            ]);

        // Simpan data ke database
        Mahasiswa::create($validated);


        return redirect()->route('mahasiswa.create')->with('success', 'Data mahasiswa berhasil disimpan!');
    }

    public function destroy($id)
    {
        // Cari data berdasarkan ID di tabel mahasiswas dan hapus
        $mahasiswas = Mahasiswa::findOrFail($id);
        $mahasiswas->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data mahasiswa berhasil dihapus.');
    }

}
