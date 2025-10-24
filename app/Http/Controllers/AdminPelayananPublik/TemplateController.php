<?php

namespace App\Http\Controllers\AdminPelayananPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        // Data dummy kategori
        $kategories = [
            ['id' => 1, 'nama_kategori' => 'Kategori A'],
            ['id' => 2, 'nama_kategori' => 'Kategori B'],
            ['id' => 3, 'nama_kategori' => 'Kategori C'],
        ];

        // Data dummy template
        $templates = [
            [
                'id' => 1,
                'nama_template' => 'Template 1',
                'kategori_id' => 1,
                'kategori' => ['id' => 1, 'nama_kategori' => 'Kategori A'],
                'file' => 'storage/templates/template1.pdf'
            ],
            [
                'id' => 2,
                'nama_template' => 'Template 2',
                'kategori_id' => 2,
                'kategori' => ['id' => 2, 'nama_kategori' => 'Kategori B'],
                'file' => 'storage/templates/template2.docx'
            ],
            [
                'id' => 3,
                'nama_template' => 'Template 3',
                'kategori_id' => 3,
                'kategori' => ['id' => 3, 'nama_kategori' => 'Kategori C'],
                'file' => 'storage/templates/template3.xlsx'
            ],
        ];

        return view('adminpelayananpublik.template.index', compact('templates', 'kategories'));
    }

    public function store(Request $request)
    {
        // Kalau pakai dummy, kita bisa langsung redirect
        return redirect()->route('adminpelayananpublik.template.index')
            ->with('success', 'Template berhasil ditambahkan (dummy).');
    }

    public function update(Request $request, $id)
    {
        // Dummy: langsung redirect
        return redirect()->route('adminpelayananpublik.template.index')
            ->with('success', "Template ID $id berhasil diperbarui (dummy).");
    }

    public function destroy($id)
    {
        // Dummy: langsung redirect
        return redirect()->route('adminpelayananpublik.template.index')
            ->with('success', "Template ID $id berhasil dihapus (dummy).");
    }
}
