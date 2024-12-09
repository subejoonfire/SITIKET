<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
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
            'login' => 'Email atau password salah.',
        ]);
    }
    public function registerr(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Username tidak boleh kosong.',
            'name.max' => 'Username maksimal 255 karakter.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 4,
        ]);

        return redirect()->to('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    public function image_update(Request $request)
    {
        $user = User::find(auth()->user()->id);


        if ($request->hasFile('image') && $user->image != NULL) {
            $file = $request->file('image');
            $fileName = time() . 'user' . auth()->user()->id . '.' . $file->getClientOriginalExtension();
            unlink(public_path('back-end/assets/img/' . $user->image));
            $file->move(public_path('back-end/assets/img/'), $fileName);
            $user->image = $fileName;
            $user->save();
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . 'user' . auth()->user()->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('back-end/assets/img/'), $fileName);
            $user->image = $fileName;
            $user->save();
        }

        return back()->with('success', 'Foto berhasil diperbarui!');
    }
    public function profile_update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'old_password' => 'nullable|string|max:255',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);
        $user = User::find(auth()->user()->id);
        if (!empty($request->old_password) && !empty($request->new_password)) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
            } else {
                return back()->withErrors(['old_password' => 'Password lama tidak sesuai']);
            }
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return back()->with('success', 'Profil berhasil diperbarui!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
