<?php

namespace App\Http\Controllers\AdminPelayananPublik;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // orderBy kolom primary key yang benar
        $kategories = Kategori::orderBy('id_kategori', 'asc')->get();
        return view('adminpelayananpublik.kategori.index', compact('kategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        // redirect ke halaman index
        return redirect()->route('adminpelayananpublik.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('adminpelayananpublik.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();

        return redirect()->route('adminpelayananpublik.kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }

}
