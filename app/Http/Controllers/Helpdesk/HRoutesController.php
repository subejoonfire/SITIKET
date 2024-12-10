<?php

namespace App\Http\Controllers\Helpdesk;

use App\Models\Ticket;
use App\Models\Pic;
use App\Http\Controllers\Controller;

class HRoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'incoming' => Ticket::with('pics')->whereNull('idpic')->count(),
            'done' => Ticket::with('pics')->whereNotNull('idpic')->count(),
            'collection' => Ticket::with(['users', 'pics'])->get()
        ];
        return view('pages.helpdesk.dashboard', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'data' => Ticket::with(['users'])->where('tickets.id', $id)->first(),
            'collection' => Pic::all(),
        ];

        return view('pages.helpdesk.detail', $data);
    }

    public function validation()
    {

        $data = [
            'title' => 'SI-TIKET | RIWAYAT_VALIDASI',
            'collection' => Ticket::with(['users', 'pics'])->whereNotNull('tickets.idpic')->get(),
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
