<?php

namespace App\Http\Controllers\AdminPelayananPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    private $kategories = [
        ['id' => 1, 'nama_kategori' => 'Pelayanan Publik'],
        ['id' => 2, 'nama_kategori' => 'Pengaduan Masyarakat'],
    ];

    public function index()
    {
        $kategories = session('kategories', $this->kategories);
        return view('adminpelayananpublik.kategori.index', compact('kategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategories = session('kategories', $this->kategories);
        $newKategori = [
            'id' => count($kategories) + 1,
            'nama_kategori' => $request->nama_kategori,
        ];

        $kategories[] = $newKategori;
        session(['kategories' => $kategories]);

        return response()->json(['message' => 'Kategori berhasil ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategories = session('kategories', $this->kategories);

        foreach ($kategories as &$kategori) {
            if ($kategori['id'] == $id) {
                $kategori['nama_kategori'] = $request->nama_kategori;
            }
        }

        session(['kategories' => $kategories]);

        return response()->json(['message' => 'Kategori berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $kategories = session('kategories', $this->kategories);
        $kategories = array_values(array_filter($kategories, fn($kategori) => $kategori['id'] != $id));
        session(['kategories' => $kategories]);

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
