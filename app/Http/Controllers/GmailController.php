<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Gmail;
use Illuminate\Support\Facades\Auth;

class GmailController extends Controller
{
    public function connect()
    {
        $client = new Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(route('gmail.callback'));

        $client->addScope(Google_Service_Gmail::GMAIL_SEND);
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        return redirect($client->createAuthUrl());
    }

    public function callback(Request $request)
    {
        if (!$request->code) {
            return back()->with('error', 'Gagal menghubungkan Gmail.');
        }

        $client = new Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(route('gmail.callback'));

        $token = $client->fetchAccessTokenWithAuthCode($request->code);

        $admin = Auth::user();
        $admin->gmail_token = json_encode($token);
        $admin->save();

        // 🔥 Redirect berdasarkan role
        return redirect()->route($this->redirectByRole($admin->role))
            ->with('success', 'Gmail berhasil terhubung!');
    }

    public function disconnectGmail()
    {
        $admin = Auth::user();
        $admin->gmail_token = null;
        $admin->save();

        return back()->with('success', 'Gmail berhasil di-unconnect.');
    }

    private function redirectByRole(string $role): string
    {
        return match ($role) {
            //
            'ADMIN_RB'               => 'adminrb.dashboard',
            'ADMIN_KELEMBAGAAN'     => 'adminkelembagaan.dashboard',
            'ADMIN_PELAYANAN_PUBLIK' => 'adminpelayananpublik.dashboard',
        };
    }
}
