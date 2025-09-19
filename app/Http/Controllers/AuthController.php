<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Login Halaman
    public function login(){
        return view ('auth.login');
    }

    public function authenticating(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();


            if ($user->status != 'active') {
                Auth::logout();
                Session::flash('status', 'failed');
                Session::flash('message', 'Account Tidak Aktif, Contact Admin');
                return redirect('/login-dashboard');
            }

            $request->session()->regenerate();
            if($user->role == 'admin'){
                return redirect('/admin/dashboard-admin');
            }
            if($user->role == 'petugas'){
                return redirect('/petugas/dashboard-petugas');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Tidak Terdaftar!');
        return redirect('/login-dashboard');
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('logout');
    }
    
}
