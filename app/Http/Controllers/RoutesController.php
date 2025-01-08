<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoutesController extends Controller
{
    public function landing()
    {

        $data = [
            'title' => 'BERANDA | SI-TICKET',
            'page' => 'beranda',
        ];

        return view('pages/landing', $data);
    }
    public function index()
    {
        return view('pages/login');
    }
    public function register()
    {
        return view('pages/register');
    }
    public function send_email_verify()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('emails/send_verify', $data);
    }
    public function send_phone_verify()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('phones/send_verify', $data);
    }
    public function profile()
    {

        $data = [
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'title' => 'SI-TIKET | PROFILE',
        ];

        return view('pages/profile', $data);
    }
}
