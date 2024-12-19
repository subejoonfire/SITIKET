<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Controller
{
    public $notification, $notificationData;
    public function __construct()
    {
        $this->notificationData = [];
        $notifications = Ticket::with([
            'messages.user_from',
        ])->get();
        if (auth()->check()) {
            if (auth()->user()->level == 3) {
                foreach ($notifications as $item) {
                    $this->notification += $item->messages->where('iduser_to', auth()->user()->id)->where('read_pic', false)->count();
                    $messages = $item->messages->where('iduser_to', auth()->user()->id)->where('read_pic', false);
                    foreach ($messages as $message) {
                        $this->notificationData[] = $message;
                    }
                }
            }
            if (auth()->user()->level == 4) {
                foreach ($notifications as $item) {
                    $this->notification += $item->messages->where('iduser_to', auth()->user()->id)->where('read_user', false)->count();
                    $messages = $item->messages->where('iduser_to', auth()->user()->id)->where('read_user', false);
                    foreach ($messages as $message) {
                        $this->notificationData[] = $message;
                    }
                }
            }
        }
    }
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
                return redirect()->to(url('pic'));
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . 'user' . auth()->user()->id . '.' . $file->getClientOriginalExtension();
            if ($user->image) {
                Storage::delete('public/profiles/' . $user->image);
            }
            $file->storeAs('public/profiles', $fileName);
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
    public function message_store(Message $message, Document $document, Request $request, $id)
    {
        $ticket = Ticket::with(['users_tickets.user_pic'])->find($id);
        $message->message = $request->input('message');
        $message->idticket = $id;
        $message->iduser_from = auth()->user()->id;
        if (auth()->user()->level == '4') {
            $message->iduser_to = $ticket->users_tickets->pluck('user_pic.id')->first();
        } elseif (auth()->user()->level == '3') {
            $message->iduser_to = $ticket->iduser;
        }
        $message->save();
        if ($request->hasFile('documentname')) {
            foreach ($request->file('documentname') as $file) {
                $extension = $file->getClientOriginalExtension();
                $uniqueFileName = 'doc_' . auth()->user()->id . '_' . time() . '_' . uniqid() . '.' . $extension;
                $filePath = $file->storeAs('documents', $uniqueFileName, 'public');
                $document->idmessage = $message->id;
                $document->documentname = $file->getClientOriginalName();
                $document->path_documentname = $filePath;
                $document->save();
            }
        }
        return redirect()->back();
    }
    public function delete_update()
    {
        Storage::delete('public/profiles/' . auth()->user()->image);
        User::find(auth()->user()->id)->update(['image' => null]);
        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
