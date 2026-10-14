<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{


public function show()
{
    return view('profile.show', ['user' => Auth::user()]);
}

public function updatePassword(Request $request)
{
    $request->validate([
        'password_lama' => 'required',
        'password_baru' => 'required|min:8|confirmed',
    ], [
        'password_lama.required' => 'Password lama wajib diisi.',
        'password_baru.required' => 'Password baru wajib diisi.',
        'password_baru.min' => 'Password baru minimal 8 karakter.',
        'password_baru.confirmed' => 'Konfirmasi password tidak sama.',
    ]);

    $user = Auth::user();

    if (! $user instanceof User) {
        return back()->withErrors([
            'password_lama' => 'User tidak ditemukan.',
        ]);
    }

    if (! Hash::check($request->password_lama, $user->password)) {
        return back()->withErrors([
            'password_lama' => 'Password lama salah.',
        ]);
    }

    $user->update([
        'password' => Hash::make($request->password_baru),
    ]);

    return back()->with('success', 'Password berhasil diganti.');
}
}
