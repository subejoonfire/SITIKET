<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\Document;
use App\Mail\MessageMail;
use Illuminate\Support\Str;
use App\Models\UsersTickets;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Controller
{
    public $notification, $notificationData;
    public function __construct()
    {
        $this->notificationData = [];
        if (auth()->check() && auth()->user()->level != 1) {
            $notifications = Ticket::with([
                'messages.user_from',
            ])->get();
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
            if (Auth::user()->email_verified_at == null) {
                return redirect()->to('verification.notice');
            }
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
    public function registerAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:18',
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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'level' => 4,
        ]);

        return redirect()->to('login')->with('success', 'Akun berhasil dibuat silahkan login untuk verifikasi.');
    }
    public function verifyEmail()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->to('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $data = [
            'link' => url('verify/' . $user->password . '/' . $user->id),
        ];
        return view('emails.verify', $data);
    }

    public function verifyme($hash, $id)
    {
        $user = User::where([
            'password' => $hash,
            'id' => $id,
        ])->first();
        if ($user) {
            $user->email_verified_at = now();
            $user->save();
            return redirect()->to('login')->with('success', 'Akun berhasil diverifikasi! Silahkan masuk');
        }
        return redirect()->to('login')->with('error', 'Akun gagal diverifikasi!');
    }
    public function verify()
    {
        try {
            // $user = auth()->user();
            // $verificationLink = url('verifyme/' . urlencode($user->password) . '/' . $user->id);
            // Mail::send('emails.verify', ['link' => $verificationLink, 'user' => $user], function ($message) use ($user) {
            //     $message->to($user->email)
            //         ->subject('Verifikasi Akun SITIKET');
            // });
            Mail::to(auth()->user()->email)->queue(new VerificationMail(auth()->user()->password, auth()->user()->id));
            return redirect()->back()->with('success', 'Email verifikasi telah dikirim. Silakan cek inbox Anda!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim email verifikasi. Silakan coba lagi!');
        }
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
        $request->validate([
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
        $request->validate([
            'message' => 'required',
        ]);

        $ticket = Ticket::with(['users_tickets.user_pic'])->find($id);

        $message->message = $request->input('message');
        $message->idticket = $id;
        $message->iduser_from = auth()->user()->id;

        if (auth()->user()->level == '4') {
            $message->iduser_to = $ticket->users_tickets->pluck('user_pic.id')->first();
        } elseif (auth()->user()->level == '3') {
            $message->iduser_to = $ticket->iduser;
        }

        $recipientEmails = [];
        if (auth()->user()->level == '4') {
            $checkPic = UsersTickets::where('idticket', $id)->get();
            $uniquePics = $checkPic->pluck('user_pic.email')->unique();
            $recipientEmails = $uniquePics->toArray();
        } elseif (auth()->user()->level == '3') {
            $recipientEmails[] = $ticket->users->email;
        }
        try {
            foreach ($recipientEmails as $email) {
                Mail::to($email)->queue(new MessageMail($message->message, $message->iduser_from, $message->iduser_to, $ticket));
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

            return redirect()->back()->with('success', 'Pesan berhasil dikirim dan disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengirim email atau menyimpan pesan: ' . $e->getMessage());
        }
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
