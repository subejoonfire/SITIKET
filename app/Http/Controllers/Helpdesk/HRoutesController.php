<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HRoutesController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard'
        ];

        return view('pages.helpdesk.dashboard', $data);
    }

    public function detail()
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard'
        ];

        return view('pages.helpdesk.detail', $data);
    }

    public function validation()
    {

        $data = [
            'title' => 'SI-TIKET | RIWAYAT_VALIDASI',
            'page' => 'beranda',
        ];


        return view('pages.helpdesk.validasi', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | PROFILE',
            'page' => 'beranda',
        ];


        return view('pages.helpdesk.profile', $data);
    }
}
