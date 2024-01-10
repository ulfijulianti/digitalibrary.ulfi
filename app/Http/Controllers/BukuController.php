<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('bukus.index', compact('bukus'));
    }

    public function create()
    {
        return view('bukus.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('bukus.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($bukuID)
    {
        $bukus = Buku::findOrFail($bukuID);
        return view('bukus.edit', compact('bukus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update([
            'judul'     => $request->judul,
            'penulis'     => $request->penulis,
            'penerbit'     => $request->penerbit,
            'tahun_terbit'     => $request->tahun_terbit,
        ]);

        return redirect()->route('bukus.index')
            ->with('success', 'Buku berhasil diubah!');
    }
    public function destroy($bukuID)
    {
        $buku=Buku::findOrFail($bukuID);
        $buku->delete();

        return redirect()->route('bukus.index')->with(['success' => 'Buku Berhasil Dihapus!']);
    }

    // Tambahkan fungsi create, read, update, dan delete di sini sesuai kebutuhan
}