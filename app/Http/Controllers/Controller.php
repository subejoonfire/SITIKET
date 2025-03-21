<?php

namespace App\Http\Controllers;

use App\Models\Pics;
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
use App\Jobs\SendWhatsappMessage;
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
        $this->notification = 0;

        if (auth()->check() && (auth()->user()->level == 3 || auth()->user()->level == 4)) {
            $notifications = Ticket::with(['messages.user_from'])
                ->whereHas('messages', function ($query) {
                    $query->where('iduser_to', auth()->user()->id);
                })
                ->get();

            foreach ($notifications as $ticket) {
                foreach ($ticket->messages as $message) {
                    if (auth()->user()->level == 3 && !$message->read_pic && $message->iduser_from != auth()->user()->id) {
                        $this->notification++;
                        $this->notificationData[] = $message;
                    } elseif (auth()->user()->level == 4 && !$message->read_user && $message->iduser_from != auth()->user()->id) {
                        $this->notification++;
                        $this->notificationData[] = $message;
                    }
                }
            }
        }
    }

    // public function whatsapp_send()
    // {
    //     $i = 1;
    //     while ($i < 100) {
    //         $params = array(
    //             'token' => 'ulwrrwkyu0z1vwlj',
    //             // 'to' => '+6283847196461',
    //             'to' => '+6283159165314',
    //             'body' => 'AOKWKOWKOWOKWKOWKOWKO'
    //         );
    //         $curl = curl_init();
    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => "https://api.ultramsg.com/instance102963/messages/chat",
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => "",
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 30,
    //             CURLOPT_SSL_VERIFYHOST => 0,
    //             CURLOPT_SSL_VERIFYPEER => 0,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => "POST",
    //             CURLOPT_POSTFIELDS => http_build_query($params),
    //             CURLOPT_HTTPHEADER => array(
    //                 "content-type: application/x-www-form-urlencoded"
    //             ),
    //         ));

    //         $response = curl_exec($curl);
    //         $err = curl_error($curl);

    //         curl_close($curl);

    //         if ($err) {
    //             echo "cURL Error #:" . $err;
    //         } else {
    //             echo $response;
    //         }
    //         $i++;
    //     }
    // }
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
                return redirect()->to('email/verification/notice');
            } elseif (Auth::user()->mobile_verified_at == null) {
                return redirect()->to('phone/verification/notice');
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
    public function email_verifyme($hash, $id)
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
    public function email_verify()
    {
        try {
            Mail::to(auth()->user()->email)->send(new VerificationMail(auth()->user()->password, auth()->user()->id));
            return redirect()->back()->with('success', 'Email verifikasi telah dikirim. Silakan cek inbox Anda!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim email verifikasi. Silakan coba lagi!');
        }
    }
    public function phone_verify(Request $request)
    {
        if ($request->otp == auth()->user()->phone_verification_token) {
            $user = User::find(auth()->user()->id);
            $user->phone_verified_at = now();
            $user->phone_verification_token = NULL;
            $user->save();
            if (auth()->user()->level == 1) {
                return redirect()->to(url('admin'));
            } elseif (auth()->user()->level == 2) {
                return redirect()->to(url('helpdesk'));
            } elseif (auth()->user()->level == 3) {
                return redirect()->to(url('pic'));
            } elseif (auth()->user()->level == 4) {
                return redirect()->to(url('user'));
            }
        }
        return redirect()->back()->with('error', 'Kode OTP yang dimasukkan salah!');
    }
    public function send_otp()
    {
        $otp = rand(100000, 999999);
        $user = User::find(auth()->user()->id);
        $user->phone_verification_token = $otp;
        SendWhatsappMessage::dispatch(auth()->user()->phone, 'otp_notification', $otp);
        // $this->sendMessage(auth()->user()->phone, 'Berikut adalah kode OTP anda ' . $otp);
        $user->save();
        return redirect()->to(url('phone/verification/notice'));
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
        $user->save();
        return back()->with('success', 'Profil berhasil diperbarui!');
    }
    public function message_store(Message $message, Document $document, Request $request, $id)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $users_tickets = UsersTickets::with(['pics'])->where('idticket', $id)->first();

        $message->message = $request->input('message');
        $message->idticket = $id;
        $message->iduser_from = auth()->user()->id;

        if (auth()->user()->level == '4') {
            $message->iduser_to = $users_tickets->pics->first()->users->id;
        } elseif (auth()->user()->level == '3') {
            $message->iduser_to = $users_tickets->iduser;
        }

        $recipientEmails = [];
        if (auth()->user()->level == '4') {
            $recipientEmails = Pics::with('users')->where('iduserticket', $users_tickets->id)->get();
        } elseif (auth()->user()->level == '3') {
            $recipientEmails[] = $users_tickets;
        }
        try {
            foreach ($recipientEmails as $row) {
                Mail::to($row->users->email)->queue(new MessageMail($message->message, $message->iduser_from, $message->iduser_to, $users_tickets));
                SendWhatsappMessage::dispatch($row->users->phone, 'message_notification');
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
    public function change_phone(Request $request)
    {
        if (User::where('id', auth()->user()->id)->update(['phone' => $request->phone])) {
            return redirect()->back()->with('success', 'Nomor berhasil diganti');
        } else {
            return redirect()->back()->with('error', 'Nomor gagal diganti');
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
    private function sendMessage($phoneNumber, $message)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => $phoneNumber,
                'message' => $message,
            ],
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . env('TOKEN_FONNTE'),
            ],
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }

        curl_close($curl);
    }
}
