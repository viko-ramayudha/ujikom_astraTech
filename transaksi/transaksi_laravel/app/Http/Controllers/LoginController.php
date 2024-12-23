<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;



class LoginController extends Controller
{

    public function login(Request $request): RedirectResponse
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Cari pengguna berdasarkan username
        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Login failed. Invalid credentials.');
        }
        if ($password == $user->password) { 
            if ($user->role === 'user') {
                $request-> session()->put('id_user', $user-> id);
                $request->session()->put('username', $user->username);
                return redirect()->route('kategori.index')->with('success', 'Logged in successfully.');
            } else {
                return redirect()->back()->with('error', 'Access hanya untuk Pasien.');
            } 
        }
        return redirect()->back()->withInput()->with('error', 'Login failed. Invalid credentials.');
    }

    public function logout (Request $request)
    {
        $request->session()->forget('id_user');
        return redirect()->route('kategori.index')->with('success', 'Logged out successfully.');
    }
}