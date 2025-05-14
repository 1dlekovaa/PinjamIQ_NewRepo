<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Tampilkan daftar semua buku
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    // Tampilkan form untuk membuat buku baru
    public function create()
    {
        return view('buku.create');
    }

    // Simpan buku baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required',
            'pengarang' => 'required',
            'penerbit'  => 'required',
            'tahun'     => 'required|integer',
            'kategori'  => 'required',
            'stok'      => 'required|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil ditambahkan.');
    }

    // Tampilkan form edit untuk buku tertentu
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Update data buku di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required',
            'pengarang' => 'required',
            'penerbit'  => 'required',
            'tahun'     => 'required|integer',
            'kategori'  => 'required',
            'stok'      => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil diupdate.');
    }

    // Hapus buku dari database
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil dihapus.');
    }
}
