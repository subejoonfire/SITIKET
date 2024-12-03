<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
        ]);
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->level == 1) {
                return redirect()->to(url('admin'));
            } elseif (Auth::user()->level == 2) {
                return redirect()->to(url('helpdesk'));
            } elseif (Auth::user()->level == 3) {
                return redirect()->to(url('department'));
            } elseif (Auth::user()->level == 4) {
                return redirect()->to(url('user'));
            }
        }
        return back()->withErrors([
            'login' => 'Username atau password salah.',
        ]);
    }
}
