<?php

namespace App\Http\Controllers\AdminPelayananPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Template_Laporan;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    // Menampilkan semua template dan kategori
    public function index()
    {
        $kategories = Kategori::all();
        $templates = Template_Laporan::with('kategori')->get();

        return view('adminpelayananpublik.template.index', compact('templates', 'kategories'));
    }

    // Simpan template baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_template' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'file' => 'required|file|mimes:pdf,doc,docx,xlsx,xls'
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName(); // Nama asli file
        $filePath = $file->storeAs('templates', $originalName, 'public'); // Simpan di storage/app/public/templates/

        Template_Laporan::create([
            'nama_template' => $request->nama_template,
            'id_kategori' => $request->id_kategori,
            'file_path' => $filePath
        ]);

        return redirect()->route('adminpelayananpublik.template.index')
                         ->with('success', 'Template berhasil ditambahkan.');
    }

    // Update template
    public function update(Request $request, $id)
    {
        $template = Template_Laporan::findOrFail($id);

        $request->validate([
            'nama_template' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls'
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if (Storage::disk('public')->exists($template->file_path)) {
                Storage::disk('public')->delete($template->file_path);
            }

            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $filePath = $file->storeAs('templates', $originalName, 'public');
            $template->file_path = $filePath;
        }

        $template->nama_template = $request->nama_template;
        $template->id_kategori = $request->id_kategori;
        $template->save();

        return redirect()->route('adminpelayananpublik.template.index')
                         ->with('success', "Template ID $id berhasil diperbarui.");
    }

    // Hapus template
    public function destroy($id)
    {
        $template = Template_Laporan::findOrFail($id);

        // Hapus file dari storage
        if (Storage::disk('public')->exists($template->file_path)) {
            Storage::disk('public')->delete($template->file_path);
        }

        $template->delete();

        return redirect()->route('adminpelayananpublik.template.index')
                         ->with('success', "Template ID $id berhasil dihapus.");
    }

    // Optional: Unduh template langsung (jika ingin route download khusus)
    
}
