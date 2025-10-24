<?php

namespace App\Http\Controllers\AdminRB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RBAksesController extends Controller
{
    /**
     * Tampilkan daftar kontrol akses RB.
     */
    public function index()
    {
        // Dummy data dulu (nanti bisa diganti dari database)
        $aksesRb = [
            (object)[
                'id' => 1,
                'jenis_rb' => 'RB General',
                'is_open' => true,
                'start_date' => '2025-09-01',
                'end_date' => '2025-09-30',
            ],
            (object)[
                'id' => 2,
                'jenis_rb' => 'RB Tematik',
                'is_open' => false,
                'start_date' => '2025-09-05',
                'end_date' => '2025-09-25',
            ],
            (object)[
                'id' => 3,
                'jenis_rb' => 'PK Bupati',
                'is_open' => true,
                'start_date' => '2025-09-10',
                'end_date' => '2025-09-28',
            ],
        ];

        return view('adminrb.aksesrb.index', compact('aksesRb'));
    }

    /**
     * Update status akses RB.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'is_open' => 'required|boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // 🚨 Di sini nanti diganti dengan query update DB
        // Sekarang dummy dulu:
        return redirect()->route('adminrb.aksesrb.index')
                         ->with('success', 'Akses RB berhasil diperbarui.');
    }
}
