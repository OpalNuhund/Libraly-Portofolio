<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

    public function index()
    {
        $user = User::find(Auth::id());
        return view('dashboard.admin.settings', compact('user'));
    }

    public function update(Request $request)
        {
            $user = User::find(Auth::id());

            $request->validate([
                'nama' => 'string|max:255',
                'username' => 'string|max:255|unique:users,username,' . $user->id,
                'email' => 'email|max:255|unique:users,email,' . $user->id,
                'jenkel',
                'password' => 'nullable|string|min:6',
            ]);

            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->jenkel = $request->jenkel;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return redirect('admin/dashboard-admin-settings')->with('status', 'Pengaturan berhasil diperbarui!');
        }

            public function indexPetugas()
    {
        $user = User::find(Auth::id());
        return view('dashboard.petugas.settings', compact('user'));
    }

    public function updatePetugas(Request $request)
        {
            $user = User::find(Auth::id());

            $request->validate([
                'nama' => 'string|max:255',
                'username' => 'string|max:255|unique:users,username,' . $user->id,
                'email' => 'email|max:255|unique:users,email,' . $user->id,
                'jenkel',
                'password' => 'nullable|string|min:6',
            ]);

            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->jenkel = $request->jenkel;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return redirect('petugas/dashboard-petugas-settings')->with('status', 'Pengaturan berhasil diperbarui!');
        }

}
