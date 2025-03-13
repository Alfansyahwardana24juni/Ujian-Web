<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all(); // Mengambil semua data buku
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'primarykey',
            'judul_buku' => 'required|string',
            'pengarang' => 'required|string',
            'jenis_buku' => 'required|string',
            'tahun_terbit' => 'required|integer',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Simpan file gambar jika diunggah
        if ($request->hasFile('sampul')) {
            $sampulPath = $request->file('sampul')->store('sampul', 'public'); // Simpan di folder 'sampul' di dalam 'storage/app/public'
        } else {
            $sampulPath = null;
        }

        // Simpan data ke database
        Buku::create([
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'jenis_buku' => $request->jenis_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'sampul' => $sampulPath, // Simpan path gambar di database
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }
    public function destroy($id)
{
    // Cari buku berdasarkan ID
    $buku = Buku::find($id);

    // Jika buku tidak ditemukan
    if (!$buku) {
        return redirect()->route('buku.index')->with('error', 'Buku tidak ditemukan.');
    }

    // Hapus file sampul jika ada
    if ($buku->sampul) {
        Storage::disk('public')->delete($buku->sampul);
    }

    // Hapus data buku dari database
    $buku->delete();

    return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
}
}