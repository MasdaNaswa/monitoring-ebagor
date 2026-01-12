<?php

namespace App\Http\Controllers\OPD;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('opd.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id_user;

        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        $emailExists = Pengguna::where('email', $request->email)
            ->where('id_user', '!=', $userId)
            ->exists();

        if ($emailExists) {
            return back()->withErrors(['email' => 'Email sudah digunakan'])->withInput();
        }

        $user->nama_opd  = $request->nama;
        $user->email     = $request->email;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validasi password kuat: minimal 8 karakter, huruf besar, huruf kecil, angka, simbol
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => [
                'required',
                'string',
                'min:8',
                'confirmed', // harus ada password_baru_confirmation
                'regex:/[a-z]/',      // huruf kecil
                'regex:/[A-Z]/',      // huruf besar
                'regex:/[0-9]/',      // angka
                'regex:/[@$!%*?&]/'   // simbol
            ]
        ], [
            'password_baru.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol'
        ]);

        // cek password lama
        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors(['password_lama' => 'Password lama salah']);
        }

        // update password
        $user->password = Hash::make($request->password_baru);
        $user->save();

        // logout user dan redirect ke login
        Auth::logout();

        return redirect()->route('login')->with('success', 'Password berhasil diperbarui. Silakan login kembali.');
    }
}
